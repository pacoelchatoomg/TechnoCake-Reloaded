<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '1',
            'name' => 'Alan',
            'email' => 'gerson@gmail.com',
            'password' => Hash::make('password'), // Cambia 'contraseña' por la contraseña deseada
            'role' => 'admin', // Puedes agregar un campo 'admin' para marcar al usuario como administrador
        ]);
    }
}
