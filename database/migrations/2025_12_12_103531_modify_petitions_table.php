<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('petitions', function (Blueprint $table) {
            // Eliminar la FK existente
            $table->dropForeign(['category_id']);

            // Crear la nueva FK con ON DELETE CASCADE
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('petitions', function (Blueprint $table) {
            // Volver a la FK sin cascade
            $table->dropForeign(['category_id']);

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('restrict'); // comportamiento original
        });
    }
};

