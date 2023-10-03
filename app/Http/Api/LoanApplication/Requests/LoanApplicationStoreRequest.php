<?php

namespace App\Http\Api\LoanApplication\Requests;

/**
 * @property int $bank_id,
 * @property int $dealer_employee_id,
 * @property float $amount,
 * @property int $term,
 * @property float $interest_rate,
 * @property string $reason_description,
 */
class LoanApplicationStoreRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorization(): bool
    {
        return true;
    }

    public function rules(): iterable
    {
        return [
            'dealer_employee_id' => [
                'required',
                'integer',
                'exists:App\Core\Dealer\Models\DealerEmployee,id'
            ],
            'bank_id' => ['required', 'integer', 'exists:App\Core\Bank\Models\Bank,id'],
            'amount' => [
                'required',
                'numeric',
                'regex:/^\d{1,8}(\.\d{1,2})$/'
            ],
            'term' => ['required', 'integer'],
            'interest_rate' => [
                'required',
                'numeric',
                'regex:/^\d{1,3}(\.\d{1,2})$/'
            ],
            'reason_description' => ['required', 'string',],
        ];
    }
}
