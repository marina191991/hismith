<?php

namespace Database\Seeders;

use App\Core\Dealer\Models\Dealer;
use Illuminate\Database\Seeder;

class DealerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 10; $i++) {
            $dealer = new Dealer();

            $dealer->name = 'TempAuto-'.fake()->city();
            $dealer->phone = fake()->phoneNumber();
            $dealer->email = fake()->unique()->companyEmail();
            $dealer->city = fake()->city();
            $dealer->address = fake()->address();

            $dealer->save();
        }
    }
}
