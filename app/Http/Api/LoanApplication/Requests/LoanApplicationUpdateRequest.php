<?php

namespace App\Http\Api\LoanApplication\Requests;

use App\Core\LoanApplication\Models\LoanApplication;
use Illuminate\Validation\Rule;

/**
 * @property int $bank_id,
 * @property int $dealer_employee_id,
 * @property float $amount,
 * @property int $term,
 * @property float $interest_rate,
 * @property string $reason_description,
 * @property string $status
 */
class LoanApplicationUpdateRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorization(): bool
    {
        return true;
    }

    public function rules(): iterable
    {
        return [
            'dealer_employee_id' => [
                'nullable',
                'integer',
                'exists:App\Core\Dealer\Models\DealerEmployee,id'
            ],
            'bank_id' => ['nullable', 'integer', 'exists:App\Core\Bank\Models\Bank,id'],
            'amount' => [
                'nullable',
                'numeric',
                'regex:/^\d{1,8}(\.\d{1,2})$/'
            ],
            'term' => ['nullable', 'integer'],
            'interest_rate' => [
                'nullable',
                'numeric',
                'regex:/^\d{1,3}(\.\d{1,2})$/'
            ],
            'reason_description' => ['nullable', 'string'],
            'status' => [
                'nullable',
                Rule::in([
                    LoanApplication::STATUS_NEW,
                    LoanApplication::STATUS_ON_REVIEW,
                    LoanApplication::STATUS_ACCEPTED,
                    LoanApplication::STATUS_DECLINED,
                ])
            ]
        ];
    }
}
