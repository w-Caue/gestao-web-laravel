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
            $table->string('telefone', 16)->nullable();
            $table->enum('status', ['Ativo', 'Deletado'])->default('Ativo');
            $table->enum('tipo', ['Cliente', 'Empresa'])->default('Cliente');
            $table->foreignId('user');
            $table->timestamps();

            $table->foreign('user')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('pessoas');

        Schema::enableForeignKeyConstraints();
    }
};
