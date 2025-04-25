<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin felhasználó létrehozása
        User::create([
            'name' => 'Illés Kálmán',
            'username' => 'ikrex',
            'email' => 'illeskalman77@gmail.com',
            'password' => Hash::make('kami'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        // Opcionálisan létrehozhatunk további teszt felhasználókat
        // User::create([
        //     'name' => 'Teszt Felhasználó',
        //     'username' => 'teszt',
        //     'email' => 'teszt@kaldo.hu',
        //     'password' => Hash::make('password'),
        //     'is_admin' => false,
        //     'email_verified_at' => now(),
        // ]);
    }
}
