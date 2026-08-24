<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Comprobantes;

class ComprobantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comprobantes')->insert([
            [
                'numero_comprobante' => 'COMP-001',
                'fecha_emision' => '2024-06-18',
                'total_comprobante' => 250.75,
                'usuario_id' => 1, // Asegúrate de que este ID exista en la tabla usuarios
            ],
            [
                'numero_comprobante' => 'COMP-002',
                'fecha_emision' => '2024-06-19',
                'total_comprobante' => 300.00,
                'usuario_id' => 1, // Asegúrate de que este ID exista en la tabla usuarios
            ],
            // Agrega más comprobantes según sea necesario
        ]);
    }
}
