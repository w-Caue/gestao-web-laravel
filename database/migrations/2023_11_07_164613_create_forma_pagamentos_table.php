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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('status', ['Ativo', 'Deletado'])->default('Ativo');
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

        Schema::dropIfExists('pagamentos');

        Schema::enableForeignKeyConstraints();
    }
};
