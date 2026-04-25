<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PortfolioAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => config('portfolio.admin_email')],
            [
                'name' => 'Junior Rodrigues',
                'password' => Hash::make('1234567890@@@'),
                'email_verified_at' => now(),
            ]
        );
    }
}
