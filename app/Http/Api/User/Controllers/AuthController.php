<?php

namespace App\Http\Api\User\Controllers;

use App\Core\User\DataTransferObjects\LoginDTO;
use App\Core\User\UserService;
use App\Http\Api\User\Requests\LoginRequest;
use App\Http\Api\User\Responses\LoginBadCredentialsResponse;
use App\Http\Api\User\Responses\LoginSuccessResponse;

class AuthController extends \App\Http\BaseController
{
    public function __construct(protected UserService $service)
    {
    }

    public function login(LoginRequest $request): LoginSuccessResponse|LoginBadCredentialsResponse
    {
        $token = $this->service->login(
            new LoginDTO(
                email: $request->email,
                password: $request->password
            )
        );

        if (!$token) {
            return new LoginBadCredentialsResponse('Bad Credentials');
        }

        return new LoginSuccessResponse($token);
    }
}
