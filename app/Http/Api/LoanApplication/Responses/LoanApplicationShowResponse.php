<?php

namespace App\Http\Api\LoanApplication\Responses;

use App\Http\Api\LoanApplication\LoanApplicationJsonResource;

class LoanApplicationShowResponse extends \Illuminate\Http\JsonResponse
{
    public function __construct(LoanApplicationJsonResource $resource)
    {
        parent::__construct([
            'loan_application' => $resource
        ]);
    }
}
