<?php

namespace Database\Seeders;

use App\Models\Admin\Configuracao\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Joaquim Lopes',
            'email' => 'joaquimlp2013@gmail.com',
            'admin' => (bool) 1,
            'root' => (bool) 1,
            'password' => Hash::make('12345678'),
        ]);
    }
}
