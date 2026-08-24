<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venta;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venta::create([
            'cliente_id' => 1,
            'producto_id' => 1,
            'cantidad' => 2,
            'precio_unitario' => 100.00,
            'total' => 200.00
        ]);
    }
}
