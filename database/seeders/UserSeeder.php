<?php

namespace Database\Seeders;

use App\Core\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'user',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        User::query()
            ->create($data);
    }
}
