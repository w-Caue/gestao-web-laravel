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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30);
            $table->string('descricao', 100)->nullable();
            $table->string('marca', 30);
            $table->float('valor_custo', 9, 2)->nullable();
            $table->float('preco_1', 9, 2)->nullable();
            $table->float('preco_2', 9, 2)->nullable();
            $table->float('preco_3', 9, 2)->nullable();
            $table->integer('estoque')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
