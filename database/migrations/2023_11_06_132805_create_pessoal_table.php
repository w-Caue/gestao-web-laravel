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
            $table->string('nome_contato', 80)->nullable();
            $table->string('email', 120)->nullable();
            $table->string('whatsapp', 12)->nullable();
            $table->string('status')->default('Ativo');
            $table->string('tipo')->default('Cliente');
            $table->dateTime('data_nascimento')->nullable();
            $table->dateTime('data_cadatro')->nullable();
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
