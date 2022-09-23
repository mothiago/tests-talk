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
        Schema::create('atividades_economicas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('cnae', 15);
            $table->string('cnae_descricao', 250);
            $table->smallInteger('nivel');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('atividades_municipais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cidade_id');
            $table->string('codigo', 50);
            $table->text('descricao');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cidade_id')->references('id')->on('cidades');
        });

        Schema::create('atividades_economicas_empresa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('empresa_id');
            $table->uuid('atividade_economica_id');
            $table->boolean('is_ativo')->default(true);
            $table->boolean('is_principal')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('atividade_economica_id')->references('id')->on('atividades_economicas');
            $table->unique(['empresa_id', 'atividade_economica_id'],'IDX1605973404_unique');
        });

        Schema::create('atividades_municipais_empresa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('empresa_id');
            $table->uuid('atividade_municipal_id');
            $table->uuid('atividade_economica_id');
            $table->float('aliquota_iss')->nullable();
            $table->boolean('is_ativo')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('atividade_municipal_id')->references('id')->on('atividades_municipais');
            $table->foreign('atividade_economica_id')->references('id')->on('atividades_economicas');
            $table->unique(['empresa_id', 'atividade_economica_id', 'atividade_municipal_id'],'IDX1605973405_unique');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('atividades_economicas');
        Schema::dropIfExists('atividades_municipais');
        Schema::dropIfExists('atividades_economicas_empresa');
        Schema::dropIfExists('atividades_municipais_empresa');
    }
};
