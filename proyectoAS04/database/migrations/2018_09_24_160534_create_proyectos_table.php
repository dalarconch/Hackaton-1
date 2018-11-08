<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nombre')->nullable();
            $table->integer('id_profesor')->nullable();
            $table->integer('id_universidad')->nullable();
            $table->integer('anio')->nullable();
            $table->string('ramo')->nullable();
            $table->string('complejidad')->nullable();
            $table->string('duracion')->nullable();
            $table->integer('sectorsocio')->nullable();
            $table->integer('facultad')->nullable();
            $table->integer('cantidad_alumnos')->nullable();
            $table->string('visible')->nullable();
            $table->string('evaluaciones')->nullable();
            $table->text('otras_evaluaciones')->nullable();
            $table->integer('porcentaje')->nullable();
            $table->integer('objalcanzados')->nullable();
            $table->string('resumen')->nullable();
            $table->text('objetivos')->nullable();
            $table->text('resultados')->nullable();
            $table->text('conclusion')->nullable();
            $table->string('estado')->nullable();
            $table->string('nombre_archivo')->nullable();
            $table->string('nombre_extension')->nullable();
            $table->string('encuesta_archivo')->nullable();
            $table->string('encuesta_extension')->nullable();
            $table->integer('id_curso')->nullable();
            $table->integer('alumnos')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proyectos');
    }
}
