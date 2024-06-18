<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_agenda', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 125);
            $table->dateTime('data_agendamento');
            $table->string('descricao', 255)->nullable();
            $table->enum('status', ['pendente', 'em_execusao', 'concluido', 'cancelado'])->default('pendente');
            $table->unsignedBigInteger('cliente_id')->unsigned();
            $table->unsignedBigInteger('empresa_id')->unsigned();
            $table->unsignedBigInteger('servico_id')->unsigned();
            $table->unsignedBigInteger('profissional_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')->on('tb_clientes');
            $table->foreign('empresa_id')->references('id')->on('tb_empresas');
            $table->foreign('servico_id')->references('id')->on('tb_servicos');
            $table->foreign('profissional_id')->references('id')->on('tb_profissionais');
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
        Schema::dropIfExists('tb_agenda');
    }
}
