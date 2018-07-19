<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedDecimal('version',2,1)->default(1.0);
            $table->char('folioControl', 40)->unique();
             $table->char('estatus', 10)->default('enabled');
            $table->unsignedInteger('responsable_id');
            $table->unsignedInteger('carrera_id');
            $table->unsignedInteger('profesionista_id');
            $table->unsignedInteger('expedicion_id');
            $table->unsignedInteger('antecedente_id');
            $table->unsignedInteger('autenticacion_id');

            $table->unsignedTinyInteger('edo')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('profesionista_id')->references('id')->on('profesionistas');
            $table->foreign('expedicion_id')->references('id')->on('expediciones');
            $table->foreign('antecedente_id')->references('id')->on('antecedentes');
            $table->foreign('autenticacion_id')->references('id')->on('autenticaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulos');
    }
}
