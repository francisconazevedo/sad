<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoPrecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_precos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('produto_id');

            $table->string('nome');
            $table->decimal('valor')->default(0.0)->nullable(false);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('produto_precos', function (Blueprint $table) {
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_precos');
    }
}
