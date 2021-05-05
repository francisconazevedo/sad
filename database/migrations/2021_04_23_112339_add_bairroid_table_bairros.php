<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBairroIdTableBairros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_enderecos', function (Blueprint $table) {
            $table->unsignedBigInteger('bairro_id')->after('bairro');
            $table->foreign('bairro_id')->references('id')->on('bairros');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_enderecos', function (Blueprint $table) {
            $table->dropColumn('bairro_id');
        });
    }
}
