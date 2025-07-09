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
        Schema::create('zona_seguras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('radio');
            $table->float('latitud');
            $table->float('longitud');
            $table->enum('tipo_seguridad', ['ALTA', 'MEDIA', 'BAJA']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zona_seguras');
    }
};
