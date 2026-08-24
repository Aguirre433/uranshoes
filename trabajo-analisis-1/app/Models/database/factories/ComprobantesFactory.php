<?php

namespace Database\Factories;

use App\Models\Comprobantes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comprobantes>
 */
class ComprobantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo' => $this->faker->randomElement(['factura', 'boleta', 'nota_credito', 'nota_debito']),
            'serie' => strtoupper($this->faker->bothify('??')),
            'numero' => $this->faker->numerify('########'),
            'fecha_emision' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'fecha_vencimiento' => $this->faker->optional()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'cliente_id' => null,
            'proveedor_id' => null,
            'sucursal_id' => null,
            'subtotal' => $this->faker->randomFloat(2, 100, 1000),
            'iva' => $this->faker->randomFloat(2, 0, 200),
            'impuestos' => $this->faker->randomFloat(2, 0, 100),
            'monto_total' => $this->faker->randomFloat(2, 100, 1500),
            'estado' => $this->faker->randomElement(['pendiente', 'pagado', 'anulado']),
            'detalle' => $this->faker->sentence(),
        ];
    }
}
