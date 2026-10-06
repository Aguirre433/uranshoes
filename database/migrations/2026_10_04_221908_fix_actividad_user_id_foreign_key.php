<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('actividads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('actividads', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('usuarios')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('actividads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('actividads', function (Blueprint $table) {
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();
        });
    }
};