<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Jasseyda',
                'lastname' => 'Aljorna',
                'email' => 'jasseyda@gmail.com',
                'password' => bcrypt('clave123'),
                'phone' => '123456789',
                'rango' => 'admin',
            ],
            [
                'name' => 'Hilaimar',
                'lastname' => 'Apellido',
                'email' => 'hilaimar@gmail.com',
                'password' => bcrypt('clave123'),
                'phone' => '123456789',
                'rango' => 'admin',
            ]
        ]);
    }
}
