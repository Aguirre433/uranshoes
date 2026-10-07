<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('numero_orden')->unique(); // N° ORDEN
            $table->string('proveedor');              // PROVEEDOR
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('precio_costo', 10, 2);
            $table->decimal('total', 10, 2);          // TOTAL
            $table->date('fecha_pedido');             // FECHA PEDIDO
            $table->string('estado_pedido')->default('Recibido'); // Recibido, Pendiente, Cancelado (ESTADO PEDIDO)
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};