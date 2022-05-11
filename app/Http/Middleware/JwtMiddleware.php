<?php

namespace App\Http\Middleware;

use Closure;
use CloudCreativity\LaravelJsonApi\Document\Error\Error;
use CloudCreativity\LaravelJsonApi\Exceptions\JsonApiException;
use Exception;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     *
     * @param Closure $next
     * @return mixed
     * @throws JsonApiException
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $ex) {
            if ($ex instanceof TokenInvalidException) {
                $error = Error::fromArray([
                    'title' => 'invalid_token',
                    'detail' => $ex->getMessage(),
                    'status' => '401',
                ]);
                throw new JsonApiException($error, $ex);
            } elseif ($ex instanceof TokenExpiredException) {
                $error = Error::fromArray([
                    'title' => 'token_expired',
                    'detail' => $ex->getMessage(),
                    'status' => '401',
                ]);
                throw new JsonApiException($error, $ex);
            } else {
                $error = Error::fromArray([
                    'title' => 'token_not_found',
                    'detail' => $ex->getMessage(),
                    'status' => '400',
                ]);
                throw new JsonApiException($error, $ex);
            }
        }

        return $next($request);
    }
}
