<?php

namespace App\Http\Api\LoanApplication\Requests;

/**
 * @property int|null $limit
 * @property int|null $offset
 */
class LoanApplicationIndexRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function authorization(): bool
    {
        return true;
    }

    public function rules(): iterable
    {
        return [
            'limit' => 'integer',
            'offset' => 'integer',
        ];
    }
}
