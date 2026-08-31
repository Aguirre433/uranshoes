<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Creamos un usuario administrador por defecto
        $admin = Usuario::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234')
        ]);
        $admin->assignRole('Administrador');

        $usuario1 = Usuario::create([
            'name' => 'Carlos VIllalba',
            'email' => 'carlos@example.com',
            'password' => bcrypt('1234')
        ]);
        $usuario1->assignRole('Empleado');

        $usuario2 = Usuario::create([
            'name' => 'Juan Perez',
            'email' => 'juanperez@example.com',
            'password' => bcrypt('1234')
        ]);
        $usuario2->assignRole('Cliente');


    }
}
