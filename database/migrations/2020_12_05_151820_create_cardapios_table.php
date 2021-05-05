<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardapiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('horario_id');

            $table->date('dia')->nullable(false);

            $table->boolean('indisponivel')->nullable(false)->default(0);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('cardapios', function (Blueprint $table) {
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('horario_id')->references('id')->on('horarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardapios');
    }
}
