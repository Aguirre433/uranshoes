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
        Schema::create('proveedores', function (Blueprint $table) {
    $table->id();

    $table->string('nombre');
    $table->string('email')->nullable();
    $table->string('telefono')->nullable();
    $table->string('direccion')->nullable();
    $table->string('cuit')->unique();

    $table->foreignId('provincia_id')
          ->nullable()
          ->constrained('provincias')
          ->nullOnDelete();

    $table->foreignId('municipio_id')
          ->nullable()
          ->constrained('municipios')
          ->nullOnDelete();

    $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
        
    }
};
