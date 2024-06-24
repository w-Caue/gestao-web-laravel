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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id');
            $table->text('descricao',200)->nullable();
            $table->string('status');
            $table->float('total_itens', 9, 2)->nullable();
            $table->float('desconto', 9, 2)->nullable();
            $table->float('total_pedido', 9, 2)->nullable();
            $table->foreignId('user');
            $table->timestamps();

            $table->foreign('pessoa_id')->on('pessoas')->references('id');
            $table->foreign('user')->on('users')->references('id');
        });

        Schema::create('pedidos_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id');
            $table->foreignId('produto_id');
            $table->integer('quantidade')->nullable();
            $table->float('total', 9, 2)->nullable();
            $table->timestamps();

            $table->foreign('pedido_id')->on('pedidos')->references('id');
            $table->foreign('produto_id')->on('produtos')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedidos_itens');
        Schema::enableForeignKeyConstraints();
    }
};
