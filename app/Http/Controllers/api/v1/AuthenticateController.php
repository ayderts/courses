<?php

namespace App\Http\Controllers\api\v1;

use App\Constants\JSONConstant;
use App\Http\Traits\JsonApiTrait;
use App\Models\Authenticate;
use App\Models\ResponseMessage;
use App\Models\User;
use CloudCreativity\LaravelJsonApi\Contracts\Store\StoreInterface;
use CloudCreativity\LaravelJsonApi\Document\Error\Error;
use CloudCreativity\LaravelJsonApi\Exceptions\JsonApiException;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use CloudCreativity\LaravelJsonApi\Http\Requests\CreateResource;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use TCG\Voyager\Models\Role;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends JsonApiController
{
    use JsonApiTrait;

    /**
     * @param StoreInterface $store
     * @param CreateResource $request
     * @return Response
     *
     * @throws JsonApiException
     */
    public function authenticateUser(StoreInterface $store, CreateResource $request)
    {
        $credentials = $this->getRequestAttributes($request);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                $errors = $this->createErrorMessage(
                    JSONConstant::INVALID_CREDENTIALS_TITLE,
                    JSONConstant::INVALID_CREDENTIALS_DETAIL,
                    JSONConstant::NOT_FOUND_STATUS
                );

                return $this->reply()->errors($errors);
            }
        } catch (JWTException $ex) {
            $error = Error::fromArray([
                'title' => JSONConstant::INVALID_CREDENTIALS_TITLE,
                'detail' => $ex->getMessage(),
                'status' => JSONConstant::BAD_REQUEST_STATUS,
            ]);
            throw new JsonApiException($error, $ex);
        }
        $authenticate = new Authenticate();
        $authenticate->token = $token;

        return $this->reply()->content($authenticate);
    }

    /**
     * @param StoreInterface $store
     * @param CreateResource $request
     * @return Response
     * @throws JsonApiException
     */
    public function register(StoreInterface $store, CreateResource $request)
    {
        $attributes = $this->getRequestAttributes($request);
        $role = Role::where(['name' => 'user_external'])->first();

        $user = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
            'role_id' => $role->id,
        ]);
        Auth::login($user);

        try {
            if (!$token = JWTAuth::fromUser($user)) {
                $errors = $this->createErrorMessage(
                    JSONConstant::INVALID_CREDENTIALS_TITLE,
                    JSONConstant::INVALID_CREDENTIALS_DETAIL,
                    JSONConstant::BAD_REQUEST_STATUS
                );

                return $this->reply()->errors($errors);
            }
        } catch (JWTException $ex) {
            $error = Error::fromArray([
                'title' => JSONConstant::INVALID_CREDENTIALS_TITLE,
                'detail' => $ex->getMessage(),
                'status' => JSONConstant::BAD_REQUEST_STATUS,
            ]);
            throw new JsonApiException($error, $ex);
        }
        $authenticate = new Authenticate();
        $authenticate->token = $token;

        return $this->reply()->content($authenticate);
    }

    /**
     * @return Response
     *
     * @throws JsonApiException
     */
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                $errors = $this->createErrorMessage(
                    JSONConstant::USER_NOT_FOUND_TITLE,
                    JSONConstant::USER_NOT_FOUND_DETAIL,
                    JSONConstant::NOT_FOUND_STATUS
                );

                return $this->reply()->errors($errors);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $ex) {
            $error = Error::fromArray([
                'title' => JSONConstant::TOKEN_EXPIRED_TITLE,
                'detail' => $ex->getMessage(),
                'status' => JSONConstant::BAD_REQUEST_STATUS,
            ]);
            throw new JsonApiException($error, $ex);
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $ex) {
            $error = Error::fromArray([
                'title' => JSONConstant::TOKEN_INVALID_TITLE,
                'detail' => $ex->getMessage(),
                'status' => JSONConstant::BAD_REQUEST_STATUS,
            ]);
            throw new JsonApiException($error, $ex);
        } catch (Tymon\JWTAuth\Exceptions\JWTException $ex) {
            $error = Error::fromArray([
                'title' => JSONConstant::TOKEN_ABSENT_TITLE,
                'detail' => $ex->getMessage(),
                'status' => JSONConstant::BAD_REQUEST_STATUS,
            ]);
            throw new JsonApiException($error, $ex);
        }

        return $this->reply()->content($user);
    }

    /**
     * @param CreateResource $request
     * @return JsonResponse|Response
     */
    public function forgotPassword(CreateResource $request)
    {
        $attributes = $this->getRequestAttributes($request);

        if (!$user = User::where('email', $attributes['email'])->first()) {
            $errors = $this->createErrorMessage(
                JSONConstant::INVALID_CREDENTIALS_TITLE,
                JSONConstant::USER_NOT_FOUND_DETAIL,
                JSONConstant::NOT_FOUND_STATUS
            );

            return $this->reply()->errors($errors);
        }

        $user->sendResetPasswordNotification();
        $msg = new ResponseMessage('Ссылка сброса пароля успешно отправлена на почту');

        return $this->reply()->content($msg);
    }

    /**
     * @param CreateResource $request
     * @return Response
     * Временно не используется, так как востановление пароля проходит через HomeController
     * @throws JsonApiException
     */
    public function resetForgotPassword(CreateResource $request)
    {
        $attributes = $this->getRequestAttributes($request);
        $jwt = $attributes['token'];

        try {
            $decodedJwt = JWT::decode($jwt, Config::get('app.JWT_SECRET'), [JSONConstant::JWT_ALGORITHM]);
        } catch (\Exception $ex) {
            $error = Error::fromArray([
                'title' => JSONConstant::TOKEN_INVALID_TITLE,
                'detail' => $ex->getMessage(),
                'status' => '400',
            ]);
            throw new JsonApiException($error, $ex);
        }
        $user = User::where('email', $decodedJwt->email)->first();
        if ($user) {
            $user->password = Hash::make($attributes['password']);
            $user->update();
            $msg = new ResponseMessage('Пароль успешно обновлен');

            return $this->reply()->content($msg);
        } else {
            $errors = $this->createErrorMessage(
                JSONConstant::USER_NOT_FOUND_TITLE,
                JSONConstant::USER_NOT_FOUND_DETAIL,
                JSONConstant::NOT_FOUND_STATUS
            );

            return $this->reply()->errors($errors);
        }
    }
}
