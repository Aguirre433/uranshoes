<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Compras;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compras')->insert([
            [
                'numero_compra' => 'COMPRA-001',
                'fecha_compra' => '2024-06-18',
                'total_compra' => 150.75,
                'forma_pago' => 'Tarjeta de Crédito',
            ],
            [
                'numero_compra' => 'COMPRA-002',
                'fecha_compra' => '2024-06-19',
                'total_compra' => 200.00,
                'forma_pago' => 'Efectivo',
            ],
            // Agrega más compras según sea necesario
        ]);
    }
}
