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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proveedor', 100);
            $table->string('email_proveedor', 100);
            $table->string('telefono_proveedor', 20);
            $table->string('direccion_proveedor', 255)->unique();
            $table->string('cuit_proveedor', 11)->unique();
            $table->string('categoria_proveedor', 50)->unique;
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
