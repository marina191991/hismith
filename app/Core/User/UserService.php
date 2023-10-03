<?php

namespace App\Core\User;

use App\Core\User\DataTransferObjects\LoginDTO;
use App\Core\User\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function login(LoginDTO $data): ?string
    {
        if (!Auth::attempt(['email' => $data->email, 'password' => $data->password], true)) {
            return null;
        }
        /** @var User $user */
        $user = Auth::user();

        return $this->makeToken($user);
    }

    public function makeToken(User $user): string
    {
        return $user->createToken('api-token')->plainTextToken;
    }
}

