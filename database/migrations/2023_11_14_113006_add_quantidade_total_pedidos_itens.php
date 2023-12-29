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
        Schema::table('pedidos_itens', function(Blueprint $table){
            $table->integer('quantidade')->after('produto_id')->nullable();
            $table->float('total', 9, 2)->after('quantidade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos_itens', function(Blueprint $table){
            $table->dropColumn('quantidade');
            $table->dropColumn('total');
        });
    }
};
