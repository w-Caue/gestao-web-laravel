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
            $table->dateTime('data_pagamento')->nullable()->after('data_vencimento');
            $table->float('valor_pago', 9, 2)->nullable()->after('valor_documento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contas', function (Blueprint $table) {
            $table->dropColumn('data_pagamento');
            $table->dropColumn('valor_pago');
        });
    }
};
