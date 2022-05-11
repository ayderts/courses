<?php

namespace App\Http\Traits;

use CloudCreativity\LaravelJsonApi\Document\Error\Error;

trait JsonApiTrait
{
    /**
     * @param $request
     *
     * @return mixed
     */
    public function getRequestAttributes($request)
    {
        return $request->get('data')['attributes'];
    }

    public function createErrorMessage(string $title, string $detail, string $status_code): array
    {
        $errors = [];
        $error = Error::fromArray([
            'title' => $title,
            'detail' => $detail,
            'status' => $status_code,
        ]);
        array_push($errors, $error);

        return $errors;
    }
}
