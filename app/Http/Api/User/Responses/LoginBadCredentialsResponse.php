<?php

namespace App\Http\Api\User\Responses;

class LoginBadCredentialsResponse extends \Illuminate\Http\JsonResponse
{
    public function __construct(string $message)
    {
        parent::__construct(
            data: [
                'message' => $message
            ],
            status: 401
        );
    }
}
