<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cveCarrera',7)->unique();
            $table->string('nombreCarrera');
            $table->string('modalidad');
            $table->string('nivel');
            $table->date('fechaInicio')->nullable();
            $table->date('fechaTerminacion')->nullable();
            $table->string('noRevoe',100)->nullable();
            $table->unsignedInteger('autorizacion_id');
            $table->unsignedInteger('institucion_id');

            $table->unsignedTinyInteger('edo')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->foreign('autorizacion_id')->references('id')->on('autorizaciones');
            $table->foreign('institucion_id')->references('id')->on('instituciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
