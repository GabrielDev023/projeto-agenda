<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Endereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro', 125);
            $table->string('numero', 10);
            $table->string('complemento', 125)->nullable();
            $table->string('bairro', 125);
            $table->string('cidade', 125);
            $table->string('estado', 125);
            $table->string('cep', 10);
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
        Schema::dropIfExists('tb_enderecos');
    }
}
