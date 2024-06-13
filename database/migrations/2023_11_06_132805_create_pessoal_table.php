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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80);
            $table->string('email', 120)->nullable();
            $table->string('phone', 12)->nullable();
            $table->enum('status', ['Ativo', 'Deletado'])->default('Ativo');
            $table->string('tipo_cliente')->default('N')->nullable();
            $table->string('tipo_funcionario')->default('N')->nullable();
            $table->string('tipo_fornecedor')->default('N')->nullable();
            $table->dateTime('data_nascimento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
