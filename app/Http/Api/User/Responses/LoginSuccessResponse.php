<?php

namespace App\Http\Api\User\Responses;

class LoginSuccessResponse extends \Illuminate\Http\JsonResponse
{
    public function __construct(string $token)
    {
        parent::__construct([
            'token' => $token
        ]);
    }
}
