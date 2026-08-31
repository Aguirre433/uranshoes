<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_comprobantes', function (Blueprint $table) {
            $table->id();
            // Vinculación con tu tabla principal (Cabecera)
            $table->foreignId('comprobante_id')->constrained('comprobantes')->onDelete('cascade');
    
    // Vinculación con lo que estás vendiendo/comprando (si tenés tabla de productos)
            $table->foreignId('producto_id')->nullable()->constrained('productos'); 
    
    // Datos del ítem en ese preciso momento (por si cambian los precios después)
            $table->string('descripcion'); // Ej: "Camisa Azul Talle M"
            $table->decimal('cantidad', 10, 2); // Ej: 3.00
            $table->decimal('precio_unitario', 10, 2); // Ej: 1500.00
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('subtotal', 10, 2); // (Cantidad * Precio) - Descuento
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_comprobantes');
    }
};
