<?php

namespace App\Http\Api\User\Requests;

/**
 * @property string $email
 * @property string $password
 */
class LoginRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorization(): bool
    {
        return true;
    }

    public function rules(): iterable
    {
        return [
            'email' => ['required', 'string', 'exists:users,email'],
            'password' => ['required', 'string', 'max:8']
        ];
    }
}
