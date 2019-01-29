<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('dataDeInicio');
            $table->string('dataDeTermino');
            $table->integer('idCliente')->nullable()->unsigned();
            $table->integer('idLivro')->nullable()->unsigned();

            $table->timestamps();
        });

        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('idCliente')->references('id')->on('clientes');
        });
        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('idLivro')->references('id')->on('livros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
