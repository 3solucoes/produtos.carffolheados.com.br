<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto');
            $table->string('descricao_produto')->nullable();
            $table->string('qt_produto')->nullable();
            $table->string('valor_produto');
            $table->string('imagem_produto')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table){
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
