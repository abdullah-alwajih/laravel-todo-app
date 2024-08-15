<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

trait ValidatesRequests
{
    use ResponseFormat;

    protected function failedValidation(Validator $validator, $statusCode = Response::HTTP_BAD_REQUEST): void
    {
        throw new HttpResponseException(
            response()->json([
                "message" => __('exceptions.bad_request'),
                "errors" => $validator->errors()
            ], $statusCode)
        );
    }
}
