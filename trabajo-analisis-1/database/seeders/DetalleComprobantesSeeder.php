<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DetalleComprobantes;
class DetalleComprobantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detalle_comprobantes')->insert([
            [
                'comprobante_id' => 1,
                'producto_id' => 1,
                'cantidad' => 2,
                'precio_unitario' => 50.25,
            ],
            [
                'comprobante_id' => 1,
                'producto_id' => 2,
                'cantidad' => 1,
                'precio_unitario' => 100.00,
            ],
            [
                'comprobante_id' => 2,
                'producto_id' => 3,
                'cantidad' => 3,
                'precio_unitario' => 30.00,
            ],
            // Agrega más detalles de comprobantes según sea necesario
        ]);
    }
}
