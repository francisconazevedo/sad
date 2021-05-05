<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardapioAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio_acompanhamentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cardapio_id');
            $table->unsignedBigInteger('acompanhamento_categoria_id');
            $table->unsignedBigInteger('acompanhamento_id');

            $table->bigInteger('qtd_estoque')->nullable(false)->default(0);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('cardapio_acompanhamentos', function (Blueprint $table) {
            $table->foreign('cardapio_id')->references('id')->on('cardapios');
        });

        Schema::table('cardapio_acompanhamentos', function (Blueprint $table) {
            $table->foreign('acompanhamento_categoria_id')->references('id')->on('acompanhamento_categorias');
        });

        Schema::table('cardapio_acompanhamentos', function (Blueprint $table) {
            $table->foreign('acompanhamento_id')->references('id')->on('acompanhamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardapio_acompanhamentos');
    }
}
