<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClienteTelefone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente_telefone', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->unsigned();
            $table->unsignedBigInteger('telefone_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('tb_clientes');
            $table->foreign('telefone_id')->references('id')->on('tb_contatos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cliente_telefone');
    }
}
