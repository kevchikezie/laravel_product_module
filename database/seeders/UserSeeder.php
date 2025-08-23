<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testEmail = 'test@example.com';
        if (! User::where('email', $testEmail)->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => $testEmail,
            ]);
        }
    }
}
