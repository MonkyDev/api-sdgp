<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaExpedicion');
            $table->date('fechaExamenProfesional');
            $table->date('fechaExencionExamenProfesional');
            $table->unsignedTinyInteger('cumplioServicioSocial');

            $table->unsignedInteger('modalidad_id');
            $table->unsignedInteger('fundamento_id');
            $table->unsignedInteger('entidad_id');

            $table->unsignedTinyInteger('edo')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';

            $table->foreign('modalidad_id')->references('id')->on('modalidades');
            $table->foreign('fundamento_id')->references('id')->on('fundamentos');
            $table->foreign('entidad_id')->references('id')->on('entidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expediciones');
    }
}
