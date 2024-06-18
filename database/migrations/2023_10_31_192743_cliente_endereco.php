<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClienteEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente_endereco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->unsigned();
            $table->unsignedBigInteger('endereco_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('tb_clientes');
            $table->foreign('endereco_id')->references('id')->on('tb_enderecos');
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
        Schema::dropIfExists('tb_cliente_endereco');
    }
}
