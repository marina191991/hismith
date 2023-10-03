<?php

namespace Database\Seeders;

use App\Core\Bank\Models\Bank;
use App\Core\Dealer\Models\DealerEmployee;
use App\Core\LoanApplication\Models\LoanApplication;
use Illuminate\Database\Seeder;

class LoanApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dealersEmployees = DealerEmployee::all();
        $banks = Bank::all();

        $status = [
            LoanApplication::STATUS_NEW,
            LoanApplication::STATUS_ACCEPTED,
            LoanApplication::STATUS_ON_REVIEW,
            LoanApplication::STATUS_DECLINED
        ];

        for ($i = 0; $i <= 30; $i++) {
            $dealerEmployeeRandom = $dealersEmployees->random();
            $applications [] =
                [
                    'dealer_employee_id' => $dealerEmployeeRandom->id,
                    'dealer_id' => $dealerEmployeeRandom->value('dealer_id'),
                    'bank_id' => $banks->random()->id,
                    'amount' => fake()->randomFloat(2, 300000, 10999999),
                    'interest_rate' => fake()->randomFloat(2, 3, 500),
                    'term' => rand(1, 360),
                    'reason_description' => fake()->text(250),
                    'status' => $status[array_rand($status)],
                    'created_at' => fake()->dateTimeBetween('-1 year', now()),
                    'updated_at' => now(),
                ];
        }
        LoanApplication::query()
            ->insert($applications);
    }
}
