<?php

namespace App\Http\Controllers\api\v1;

use App\Constants\JSONConstant;
use App\Http\Traits\JsonApiTrait;
use App\Models\Constant;
use CloudCreativity\LaravelJsonApi\Document\Error\Error;
use CloudCreativity\LaravelJsonApi\Exceptions\JsonApiException;
use CloudCreativity\LaravelJsonApi\Http\Controllers\JsonApiController;
use Illuminate\Http\Response;
use JWTAuth;

class ConstantController extends JsonApiController
{
    use JsonApiTrait;

    /**
     * @return Response
     *
     * @throws JsonApiException
     */
    public function getConstants()
    {
        try {
            if (!JWTAuth::parseToken()->authenticate()) {
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

        $constant = new Constant();
        return $this->reply()->content($constant);
    }
}
