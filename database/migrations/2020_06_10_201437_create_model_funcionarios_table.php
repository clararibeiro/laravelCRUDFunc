<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_setor')->unsigned();
            $table->foreign('id_setor')->references('id')->on('setor')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('datanasci');
            $table->string('sexo');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('celular');
            $table->string('rg');
            $table->string('cpf');
            $table->double('salarioAtual',10,2);
            $table->string('dataAdm');
            $table->string('status');
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
        Schema::dropIfExists('funcionario');
    }
}
