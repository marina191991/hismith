<?php

namespace Database\Seeders;

use App\Core\Bank\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 10; $i++) {
            $banks [] = [
                'name' => fake()->company(),
                'email' => fake()->unique()->companyEmail(),
                'phone_first' => fake()->phoneNumber(),
                'phone_second' => fake()->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Bank::query()
            ->insert($banks);
    }
}
