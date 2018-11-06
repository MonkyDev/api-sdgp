<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionistas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('matricula', 10)->unique();
            $table->char('curp', 18)->unique();
            $table->string('nombre');
            $table->string('primerApellido');
            $table->string('segundoApellido');
            $table->string('correoElectronico',100);
            $table->date('fechaInicio_car')->nullable();
            $table->date('fechaTerminacion_car');
            $table->unsignedInteger('carrera_id');
            $table->unsignedInteger('antecedente_id');


            $table->unsignedTinyInteger('edo')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';


            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('antecedente_id')->references('id')->on('antecedentes');
            //$table->comment('tabla catalogo de los profesionistas que ya son titulados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesionistas');
    }
}
