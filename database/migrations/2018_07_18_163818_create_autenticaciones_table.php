<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutenticacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autenticaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedDecimal('version',2,1)->default(1.0);
            $table->string('folioDigital');
            $table->timestamp('fechaAutenticacion')->nullable();
            $table->string('selloTitulo');
            $table->string('noCertificadoAutoridad');
            $table->string('selloAutenticacion');

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
        Schema::dropIfExists('autenticaciones');
    }
}
