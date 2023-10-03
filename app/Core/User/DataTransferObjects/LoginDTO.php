<?php

namespace App\Core\User\DataTransferObjects;

class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }
}
