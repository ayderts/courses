<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use function auth;
use function config;
use function response;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->all();
        if (filter_var($credentials['name'], FILTER_VALIDATE_EMAIL)) {
            if (User::select('name')->where('email', $credentials['name'])->exists()) {
                $name = User::select('name')->where('email', $credentials['name'])->first()->name;
                $credentials = array_merge($credentials, ['name' => $name]);
            }
        }
        $ttl = $request->get('remember') ? 20160 : config("jwt.ttl");
        if (!$token = auth('api')->setTtl($ttl)->attempt($credentials)) {
            return response([
                "message" => __('validation.password'),
                "errors" => [
                    "password" => array(__('validation.pass'))
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->respondWithToken($token);
    }


    /**
     * Register a User.
     *
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'unique:users',
                'required_if:nationality_id,!=,1'
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
            ],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
