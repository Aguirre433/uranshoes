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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('dni', 7)->unique();
            $table->string('direccion', 255 );
            $table->string('email')->unique();
            $table->string('telefono/celular', 13);
            $table->string('cuit', 11)->unique();
            $table->string('minorista', 3);
            $table->string('mayorista', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
