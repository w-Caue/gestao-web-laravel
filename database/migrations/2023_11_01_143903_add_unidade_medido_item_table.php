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
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_medida_id')->nullable()->after('descricao');
            $table->foreign('unidade_medida_id')->references('id')->on('unidade_medidas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_unidade_medida_id_foreign');
            $table->dropColumn('unidade_medida_id');
        });
    }
};
