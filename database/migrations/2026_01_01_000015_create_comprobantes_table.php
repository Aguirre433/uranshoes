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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->string('vendedor_id', 100);
            $table->string('tipo', 30)->default('factura');
            $table->string('serie', 20)->nullable();
            $table->string('numero', 50);
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento')->nullable();
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->nullOnDelete();
            $table->foreignId('proveedor_id')->nullable()->constrained('proveedors')->nullOnDelete();
            $table->foreignId('sucursal_id')->nullable()->constrained('sucursals')->nullOnDelete();
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('iva', 10, 2)->default(0);
            $table->decimal('impuestos', 10, 2)->default(0);
            $table->decimal('monto_total', 10, 2)->default(0);
            $table->string('estado', 20)->default('pendiente');
            $table->text('detalle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobantes');
    }
};
