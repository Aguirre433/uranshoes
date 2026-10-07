<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
public function up(): void
{
    Schema::table('ventas', function (Blueprint $table) {
        if (!Schema::hasColumn('ventas', 'codigo_factura')) {
            $table->string('codigo_factura')->nullable()->after('id');
        }
    });
}

public function down(): void
{
    Schema::table('ventas', function (Blueprint $table) {
        $table->dropColumn('codigo_factura');
    });
}
};