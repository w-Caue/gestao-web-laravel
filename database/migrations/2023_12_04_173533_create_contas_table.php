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
            $table->unsignedBigInteger('pessoa_id');
            $table->string('descricao', 120)->nullable();
            $table->dateTime('data_lancamento');
            $table->dateTime('data_vencimento');
            $table->float('valor_documento', 9, 2);
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contas', function(Blueprint $table){
            $table->dropForeign('contas_pessoa_id_foreign');
            $table->dropColumn('pessoa_id');
        });

        Schema::dropIfExists('contas');
    }
};
