<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clientes::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '1234567890'
        ]);
    }
}
