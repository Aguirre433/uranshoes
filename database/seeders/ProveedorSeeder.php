<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'nombre_proveedor' => 'Proveedor 1',
            'email_proveedor' => 'proveedor1@example.com',
            'telefono_proveedor' => '1234567890',
            'direccion_proveedor' => 'Calle 1, Ciudad 1',
            'cuit_proveedor' => 12345678901
        ]);
    }
}
