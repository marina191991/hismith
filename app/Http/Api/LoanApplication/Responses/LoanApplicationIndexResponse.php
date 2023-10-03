<?php

namespace App\Http\Api\LoanApplication\Responses;

use App\Http\Common\BaseIndexResponse;

class LoanApplicationIndexResponse extends BaseIndexResponse
{
    protected function getPluralResourceName(): string
    {
        return 'loan_applications';
    }
}
