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
        Schema::table('pedidos', function(Blueprint $table){
            $table->foreignId('pagamento_id')->nullable()->after('pessoa_id');
            $table->foreign('pagamento_id')->references('id')->on('pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function(Blueprint $table){
            $table->dropForeign('pedidos_pagamento_id_foreign');

            $table->dropColumn('descricao');
            $table->dropColumn('pagamento_id');
        });
    }
};
