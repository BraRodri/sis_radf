<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'document' => '11.111.111',
            'names' => 'Super Admin',
            'grado' => 'Oficial',
            'distintivo' => 'General',
            'arma' => 'Ninguno',
            'brigada' => 'TRIGESIMA BRIGADA N° 30 CUCUTA DIV02',
            'email' => 'admin@gmail.com',
            'email_corporativo' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'estado' => 'Activo',
            'rol' => 1
        ]);
    }
}
