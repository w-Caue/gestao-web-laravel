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
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('descricao', 120)->nullable();
            $table->dateTime('data_lancamento');
            $table->dateTime('data_vencimento');
            $table->float('valor_documento', 9, 2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contas', function(Blueprint $table){
            $table->dropForeign('contas_cliente_id_foreign');
            $table->dropColumn('cliente_id');
        });

        Schema::dropIfExists('contas');
    }
};
