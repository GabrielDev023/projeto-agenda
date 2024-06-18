<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profissional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 125);
            $table->string('documento', 20)->nullable();
            $table->string('email')->unique();
            $table->enum('status', ['ativo', 'ferias', 'inativo'])->default('ativo');
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
        Schema::dropIfExists('tb_profissionais');
    }
}
