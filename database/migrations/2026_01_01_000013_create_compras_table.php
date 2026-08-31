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
       Schema::create('compras', function (Blueprint $table) {
    $table->id();

    $table->string('numero_compra')->unique();

    $table->foreignId('proveedor_id')
          ->constrained('proveedores')
          ->onDelete('cascade');

    $table->foreignId('usuario_id')
          ->constrained('usuarios')
          ->onDelete('cascade');

    $table->foreignId('sucursal_id')
          ->constrained('sucursales')
          ->onDelete('cascade');

    $table->date('fecha');
    $table->string('forma_pago');
    $table->decimal('total', 10, 2);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
