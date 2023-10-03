<?php

namespace App\Core\LoanApplication;

use App\Core\LoanApplication\DataTransferObjects\LoanApplicationDTO;
use App\Core\LoanApplication\DataTransferObjects\LoanApplicationUpdateDTO;
use App\Core\LoanApplication\Models\LoanApplication;

class LoanApplicationService
{
    public function create(LoanApplicationDTO $applicationDTO): LoanApplication
    {
        $model = new LoanApplication();

        $model->bank()->associate($applicationDTO->bank);
        $model->dealerEmployee()->associate($applicationDTO->dealerEmployee);
        $model->dealer()->associate($applicationDTO->dealerEmployee->dealer()->first());
        $model->amount = $applicationDTO->amount;
        $model->term = $applicationDTO->term;
        $model->interest_rate = $applicationDTO->interestRate;
        $model->reason_description = $applicationDTO->reasonDescription;
        $model->status = LoanApplication::STATUS_NEW;

        $model->save();

        return $model;
    }

    public function update(LoanApplicationUpdateDTO $applicationDTO, LoanApplication $loanApplication): LoanApplication
    {
        $dataForUpdate = [
            'dealer_employee_id' => $applicationDTO->dealerEmployee->id,
            'dealer_id' => $applicationDTO->dealerEmployee->dealerId,
            'bank_id' => $applicationDTO->bank->id,
            'amount' => $applicationDTO->amount,
            'interest_rate' => $applicationDTO->interestRate,
            'term' => $applicationDTO->term,
            'reason_description' => $applicationDTO->reasonDescription,
            'status' => $applicationDTO->status,
        ];

        $loanApplication->update(array_filter($dataForUpdate));

        return $loanApplication;
    }

    public function delete(LoanApplication $loanApplication): bool
    {
        return $loanApplication->delete();
    }
}
