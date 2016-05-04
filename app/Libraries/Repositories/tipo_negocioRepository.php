<?php

namespace App\Libraries\Repositories;


use App\Models\tipo_negocio;
use Illuminate\Support\Facades\Schema;

class tipo_negocioRepository
{

	/**
	 * Returns all tipo_negocios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return tipo_negocio::all();
	}

	public function search($input)
    {
        $query = tipo_negocio::query();

        $columns = Schema::getColumnListing('tipo_negocios');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores tipo_negocio into database
	 *
	 * @param array $input
	 *
	 * @return tipo_negocio
	 */
	public function store($input)
	{
		return tipo_negocio::create($input);
	}

	/**
	 * Find tipo_negocio by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|tipo_negocio
	 */
	public function findtipo_negocioById($id)
	{
		return tipo_negocio::find($id);
	}

	/**
	 * Updates tipo_negocio into database
	 *
	 * @param tipo_negocio $tipoNegocio
	 * @param array $input
	 *
	 * @return tipo_negocio
	 */
	public function update($tipoNegocio, $input)
	{
		$tipoNegocio->fill($input);
		$tipoNegocio->save();

		return $tipoNegocio;
	}
}