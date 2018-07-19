<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarreras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cveCarrera',7)->unique();
            $table->string('nombreCarrera');
            $table->date('fechaInicio');
            $table->date('fechaTerminacion');
            $table->unsignedInteger('idAutorizacionesReconocimientos');
            $table->string('noRevoe',100);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Carreras');
    }
}
