<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('produto_id')->nullable();
            $table->unsignedBigInteger('produto_preco_id')->nullable();
            $table->unsignedBigInteger('cardapio_id')->nullable();
            $table->unsignedBigInteger('forma_entrega_id')->nullable();
            $table->unsignedBigInteger('forma_pagamento_id')->nullable();
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();

            $table->decimal('valor')->default(0.0)->nullable(false);

            /*
             * 1 - Pendente de Andamento
             * 2 - Em andamento
             * 3 - Rejeitado
             * 4 - Saiu para Entrega
             * 5 - Entregue
             */
            $table->integer('status')->nullable(false)->default(1);

            $table->boolean('pago')->nullable(false)->default(false);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('produto_preco_id')->references('id')->on('produto_precos');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('cardapio_id')->references('id')->on('cardapios');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('forma_entrega_id')->references('id')->on('forma_entregas');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamentos');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('users');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('endereco_id')->references('id')->on('user_enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
