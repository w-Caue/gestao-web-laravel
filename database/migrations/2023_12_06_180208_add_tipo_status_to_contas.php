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
        Schema::table('contas', function (Blueprint $table) {
            $table->string('tipo')->default('Pagar')->after('valor_documento');
            $table->string('status')->default('Aberto')->after('tipo');
            $table->enum('deletado', ['S', 'N'])->default('N')->after('status');
            $table->unsignedBigInteger('forma_pagamento_id')->nullable()->after('ag_cobrador_id');
            $table->foreign('forma_pagamento_id')->references('id')->on('formas_pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contas', function (Blueprint $table) {
            $table->dropColumn('tipo');
            $table->dropColumn('status');
            $table->dropColumn('deletado');

            $table->dropForeign('contas_forma_pagamento_id_foreign');
            $table->dropColumn('forma_pagamento_id');
        });
    }
};
