<?php

namespace Database\Seeders;

use App\Core\Dealer\Models\Dealer;
use App\Core\Dealer\Models\DealerEmployee;
use Illuminate\Database\Seeder;

class DealerEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dealers = Dealer::all();
        for ($i = 0; $i <= 10; $i++) {
            $employees [] =
                [
                    'first_name' => fake()->firstName(),
                    'last_name' => fake()->lastName(),
                    'patronymic' => fake()->firstNameMale() . 'ич',
                    'email' => fake()->email(),
                    'phone' => fake()->phoneNumber(),
                    'position' => 'manager',
                    'dealer_id' => $dealers->random()->id,
                    'created_at' => now(),
                    'updated_at' =>now(),
                ];
        }

        DealerEmployee::query()->insert($employees);
    }
}
