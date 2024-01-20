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
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_id')->after('estoque')->nullable(); 
            $table->unsignedBigInteger('subgrupo_id')->after('grupo_id')->nullable(); 

            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->foreign('subgrupo_id')->references('id')->on('subgrupos');
        });

        Schema::table('grupos', function (Blueprint $table) {
            $table->unsignedBigInteger('produto_id')->after('nome')->nullable(); 
            $table->unsignedBigInteger('subgrupo_id')->after('produto_id')->nullable(); 

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('subgrupo_id')->references('id')->on('subgrupos');
        });

        Schema::table('subgrupos', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_id')->after('nome')->nullable(); 
            $table->unsignedBigInteger('produto_id')->after('grupo_id')->nullable(); 

            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->unique('grupo_id');

            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subgrupos', function (Blueprint $table) {
            $table->dropForeign('subgrupos_produto_id_foreign');
            $table->dropForeign('subgrupos_grupo_id_foreign');

            $table->dropColumn('produto_id'); 
            $table->dropColumn('grupo_id');
        });

        Schema::table('grupos', function (Blueprint $table) {
            $table->dropForeign('grupos_produto_id_foreign');
            $table->dropForeign('grupos_subgrupo_id_foreign');

            $table->dropColumn('produto_id'); 
            $table->dropColumn('subgrupo_id');
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_grupo_id_foreign');
            $table->dropForeign('produtos_subgrupo_id_foreign');

            $table->dropColumn('grupo_id');
            $table->dropColumn('subgrupo_id'); 
        });
    }
};
