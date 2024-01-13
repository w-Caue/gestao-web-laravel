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
        Schema::create('enderecos', function(Blueprint $table){
            $table->id();
            $table->integer('cep')->nullable();
            $table->string('endereco', 100)->nullable();
            $table->integer('numero')->nullable();
            $table->string('complemento', 70)->nullable();
            $table->string('bairro', 20)->nullable();
            $table->string('estado', 30)->nullable();
            $table->string('referencia', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
