<?php

use Faker\Core\Blood;
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
        Schema::table('contas', function(Blueprint $table){
            $table->foreignId('cobrador_id')->nullable()->after('descricao');
            
            $table->foreign('cobrador_id')->on('cobradores')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contas', function(Blueprint $table){
            $table->dropForeign('contas_cobrador_id_foreign');

            $table->dropColumn('cobrador_id');
            
        });
    }
};
