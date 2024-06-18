<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 125);
            $table->string('descricao', 255)->nullable();
            $table->double('valor', 10, 2);
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->unsignedBigInteger('empresa_id')->unsigned();
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
        Schema::dropIfExists('tb_servicos');
    }
}
