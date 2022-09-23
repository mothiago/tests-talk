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
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('empresa_id');
            $table->uuid('notificacao_template_id');
            $table->dateTime('agendado_em');
            $table->string('canal');
            $table->smallInteger('status');
            $table->dateTime('enfileirado_em')->nullable();
            $table->dateTime('entregue_em')->nullable();
            $table->dateTime('processado_em')->nullable();
            $table->dateTime('suspenso_em')->nullable();
            $table->text('razao_suspensao')->nullable();
            $table->uuid('service_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('notificacao_template_id')->references('id')->on('notificacao_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};
