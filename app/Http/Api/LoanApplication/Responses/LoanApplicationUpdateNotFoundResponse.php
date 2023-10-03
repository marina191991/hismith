<?php

namespace App\Http\Api\LoanApplication\Responses;

class LoanApplicationUpdateNotFoundResponse extends \Illuminate\Http\JsonResponse
{
    public function __construct(string $message)
    {
        parent::__construct([
            'message' => $message
        ]);
    }
}
