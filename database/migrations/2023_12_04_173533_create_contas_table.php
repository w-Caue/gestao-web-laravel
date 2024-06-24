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
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id');
            $table->string('descricao', 120)->nullable();
            $table->dateTime('data_lancamento');
            $table->dateTime('data_vencimento');
            $table->dateTime('data_pagamento')->nullable();
            $table->float('valor_documento', 9, 2);
            $table->float('valor_pago', 9, 2)->nullable();
            $table->string('tipo')->default('Pagar');
            $table->string('status')->default('Aberto');
            $table->enum('deletado', ['S', 'N'])->default('N');
            $table->foreignId('pagamento_id')->nullable();
            $table->foreignId('user');
            $table->timestamps();


            $table->foreign('pessoa_id')->on('pessoas')->references('id');
            $table->foreign('pagamento_id')->on('pagamentos')->references('id');
            $table->foreign('user')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('contas');

        Schema::enableForeignKeyConstraints();
    }
};
