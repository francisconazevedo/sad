<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_acompanhamentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('cardapio_acompanhamento_id');

            $table->bigInteger('quantidade')->nullable(false)->default(0);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('pedido_acompanhamentos', function (Blueprint $table) {
            $table->foreign('pedido_id')->references('id')->on('pedidos');
        });

        Schema::table('pedido_acompanhamentos', function (Blueprint $table) {
            $table->foreign('cardapio_acompanhamento_id')->references('id')->on('cardapio_acompanhamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_acompanhamentos');
    }
}
