<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatemapaslugaresTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mapaslugares', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('imagen');
			$table->integer('estado');
			$table->integer('pais_id')->unsigned();
			$table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
			$table->integer('departamento_id')->unsigned();
			$table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
			$table->integer('municipio_id')->unsigned();
			$table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mapaslugares');
	}

}
