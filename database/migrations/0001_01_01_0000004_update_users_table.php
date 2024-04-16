<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('imagem_perfil')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('sobrenome')->nullable();
            $table->unsignedBigInteger('plano_id')->nullable();
            $table->foreign('plano_id')->references('id')->on('plans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('imagem_perfil');
            $table->dropColumn('data_nascimento');
            $table->dropColumn('sobrenome');
            $table->dropForeign(['plano_id']);
        });
    }
};
