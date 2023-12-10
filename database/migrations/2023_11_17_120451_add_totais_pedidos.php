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
            $table->dropColumn('total');
        });

        Schema::table('pedidos', function(Blueprint $table){
            $table->float('total_itens', 9, 2)->after('status')->nullable();
            $table->float('desconto', 9, 2)->after('total_itens')->nullable();
            $table->float('total_pedido', 9, 2)->after('desconto')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function(Blueprint $table){
            $table->dropColumn('total_pedido');
            $table->dropColumn('desconto');
            $table->dropColumn('total_itens');
        });

        Schema::table('pedidos', function(Blueprint $table){
            $table->float('total', 9, 2)->after('status')->nullable();
        });
    }
};
