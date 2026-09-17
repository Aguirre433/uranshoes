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
        Schema::create('usuarios', function (Blueprint $table) {
    $table->id();

    $table->string('nombre_usuario');
    $table->string('email_usuario')->unique();
    $table->string('contraseña_usuario');

    $table->string('rol_usuario');

    $table->foreignId('sucursal_id')
          ->constrained('sucursales')
          ->onDelete('cascade');

    $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
