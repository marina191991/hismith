<?php

namespace App\Http\Api\LoanApplication\Responses;

use App\Http\Api\LoanApplication\LoanApplicationJsonResource;

class LoadApplicationStoreResponse extends \Illuminate\Http\JsonResponse
{
    public function __construct(LoanApplicationJsonResource $resource)
    {
        parent::__construct([
            'loan_application' => $resource
        ],
        201);
    }
}
