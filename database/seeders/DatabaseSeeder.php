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
            'email' => 'cavoinauchao@thuy.love.tkun',
            'password' => Hash::make('Tkunloveivy')
        ]);
        User::factory()->create([
            'name' => "Mr Ivy's Boyfriend",
            'username' => 'moon',
            'email' => 'thangrm@love.ivy',
            'password' => Hash::make('Ivylovetkun')
        ]);

        for ($i = 0; $i < 5; $i++) {
            Level::create([
                'name' => 'N' . $i + 1
            ]);
        }
    }
}
