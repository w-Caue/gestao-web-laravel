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
        Schema::create('information_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('numero', 12)->nullable();
            $table->enum('status', ['Ativo', 'Deletado'])->default('Ativo');
            $table->dateTime('data_nascimento')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_users');
    }
};
