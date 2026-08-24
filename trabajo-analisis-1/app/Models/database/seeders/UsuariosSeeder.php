<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nombre_usuario' => 'Juan Pérez',
                'email_usuario' => 'juan.perez@example.com',
                'contrasena_usuario' => bcrypt('password'),
            ],
        ]);
    }
}
