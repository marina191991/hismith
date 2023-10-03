<?php

namespace App\Core\LoanApplication\DataTransferObjects;

use App\Core\Bank\Models\Bank;
use App\Core\Dealer\Models\DealerEmployee;

class LoanApplicationDTO
{
    public function __construct(
        public DealerEmployee $dealerEmployee,
        public Bank $bank,
        public float $amount,
        public int $term,
        public float $interestRate,
        public string $reasonDescription,
    ) {
    }

}
