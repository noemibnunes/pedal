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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bicicleta_id')->nullable();
            $table->foreign('bicicleta_id')->references('id')->on('bicycles')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('plano_id')->nullable();
            $table->foreign('plano_id')->references('id')->on('plans')->onDelete('set null');
            $table->unsignedBigInteger('cartao_id')->nullable();
            $table->foreign('cartao_id')->references('id')->on('cards')->onDelete('set null');
            $table->decimal('valor_aluguel', 8, 2);
            $table->enum('tipo_pagamento', ['horaFixa', 'livre', 'plano']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
