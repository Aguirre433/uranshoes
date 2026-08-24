<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\Marcas;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            [
                'nombre_marca' => 'Nike',
                'descripcion_marca' => 'Marca deportiva reconocida mundialmente.',
            ],
            [
                'nombre_marca' => 'Adidas',
                'descripcion_marca' => 'Marca deportiva con una amplia gama de productos.',
            ],
            // Agrega más marcas según sea necesario
        ]);
    }
}
