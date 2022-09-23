<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->string('abreviacao', 3);
            $table->timestamps();
        });
        Schema::create('estados', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pais_id');
            $table->string('nome');
            $table->string('abreviacao',2);
            $table->timestamps();
            $table->foreign('pais_id')->references('id')->on('paises');
        });
        Schema::create('cidades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('estado_id');
            $table->string('nome');
            $table->string('codigo_ibge');
            $table->timestamps();
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('paises');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('cidades');
    }
};
