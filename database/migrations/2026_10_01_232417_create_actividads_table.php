<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Ej: "Producto agregado", "Nueva venta registrada"
            $table->string('descripcion'); // Ej: "Nike Air Max Urban", "Venta #00048"
            $table->string('tipo'); // Ej: "producto", "categoria", "venta", "usuario" (sirve para el ícono)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // Usuario que hizo la acción
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actividads');
    }
};