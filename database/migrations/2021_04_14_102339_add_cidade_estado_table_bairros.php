<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCidadeEstadoTableBairros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bairros', function (Blueprint $table) {
            $table->string('cidade')->after('nome');
            $table->string('estado')->after('cidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bairros', function (Blueprint $table) {
            $table->dropColumn('cidade');
            $table->dropColumn('estado');
        });
    }
}
