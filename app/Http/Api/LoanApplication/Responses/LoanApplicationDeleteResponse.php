<?php

namespace App\Http\Api\LoanApplication\Responses;

class LoanApplicationDeleteResponse extends \Illuminate\Http\JsonResponse
{
    public function __construct(string $data)
    {
        parent::__construct([
            'message' => $data
        ]);
    }
}
