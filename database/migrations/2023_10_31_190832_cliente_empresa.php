<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClienteEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cliente_empresa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->unsigned();
            $table->unsignedBigInteger('empresa_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('tb_clientes');
            $table->foreign('empresa_id')->references('id')->on('tb_empresas');
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
       Schema::dropIfExists('tb_cliente_empresa');
    }
}
