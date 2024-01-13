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
            $table->unsignedBigInteger('forma_pagamento_id')->nullable()->after('pessoa_id');
            $table->text('descricao',200)->nullable()->after('forma_pagamento_id');

            $table->foreign('forma_pagamento_id')->references('id')->on('formas_pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function(Blueprint $table){
            $table->dropForeign('pedidos_forma_pagamento_id_foreign');

            $table->dropColumn('descricao');
            $table->dropColumn('forma_pagamento_id');
        });
    }
};
