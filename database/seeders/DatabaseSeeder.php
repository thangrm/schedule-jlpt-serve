<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ms Ivy',
            'username' => 'ivy',
            'email' => 'test@example.com',
            'password' => Hash::make('Tkunloveivy')
        ]);

        for ($i = 0; $i < 5; $i++) {
            Level::create([
                'name' => 'N' . $i + 1
            ]);
        }
    }
}
