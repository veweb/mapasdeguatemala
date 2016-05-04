<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateanunciosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anuncios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo');
			$table->string('descripcion');
			$table->string('enlace');
			$table->integer('estado');
			$table->integer('pais_id')->unsigned();
			$table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
			$table->integer('departamento_id')->unsigned()->foreign()->references('id')->on('departamentos')->onDelete('cascade');
			$table->integer('municipio_id')->unsigned()->foreign()->references('id')->on('municipios')->onDelete('cascade');
			$table->integer('categoria_id')->unsigned()->foreign()->references('id')->on('categorias')->onDelete('cascade');
			$table->integer('mapa_id')->unsigned()->foreign()->refences('id')->on('mapaslugares')->onDelete('cascade');
			$table->string('posicion_mapa');
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
		Schema::drop('anuncios');
	}

}
