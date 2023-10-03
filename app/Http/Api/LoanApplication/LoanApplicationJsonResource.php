<?php

namespace App\Http\Api\LoanApplication;

use App\Core\LoanApplication\Models\LoanApplication;
use Illuminate\Http\Request;

class LoanApplicationJsonResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * @var LoanApplication
     */
    public $resource;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'dealer_id' => $this->resource->dealer_id,
            'dealer_employee_id' => $this->resource->dealer_employee_id,
            'bank_id' => $this->resource->bank_id,
            'amount' => $this->resource->amount,
            'term' => $this->resource->term,
            'interest_rate' => $this->resource->interest_rate,
            'reason_description' => $this->resource->reason_description,
            'status' => $this->resource->status
        ];
    }
}
