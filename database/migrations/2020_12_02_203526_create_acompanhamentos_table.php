<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanhamentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('categoria_id');

            $table->string('nome')->index();
            $table->decimal('valor')->default(0.0)->nullable(false);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('acompanhamentos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('acompanhamento_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acompanhamentos');
    }
}
