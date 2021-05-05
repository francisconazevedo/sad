<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformacoesEmpresaTableConfiguracoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configuracoes', function (Blueprint $table) {
            $table->text('historia_empresa')->after('horario_funcionamento');
            $table->text('missao')->after('historia_empresa');
            $table->text('visao')->after('missao');
            $table->text('valores')->after('visao');
            $table->text('introducao')->after('valores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuracoes', function (Blueprint $table) {
            $table->dropColumn('historia_empresa');
            $table->dropColumn('missao');
            $table->dropColumn('visao');
            $table->dropColumn('valores');
            $table->dropColumn('introducao');
        });
    }
}
