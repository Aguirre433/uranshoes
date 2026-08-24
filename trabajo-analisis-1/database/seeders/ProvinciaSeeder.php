<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provincias')->insert([
            [
                'nombre' => 'Provincia 1',
                'municipio' => 'Municipio 1',
                'codigo_postal' => '12345',
                'departamento/partido' => 'Departamento 1',
            ],
            [
                'nombre' => 'Provincia 2',
                'municipio' => 'Municipio 2',
                'codigo_postal' => '67890',
                'departamento/partido' => 'Departamento 2',
            ],
            // Agrega más provincias según sea necesario
        ]);
    }
}
