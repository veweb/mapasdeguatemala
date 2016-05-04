<?php

namespace App\Libraries\Repositories;


use App\Models\tiponegocio;
use Illuminate\Support\Facades\Schema;

class tiponegocioRepository
{

	/**
	 * Returns all tiponegocios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return tiponegocio::all();
	}

	public function search($input)
    {
        $query = tiponegocio::query();

        $columns = Schema::getColumnListing('tiponegocios');
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
	 * Stores tiponegocio into database
	 *
	 * @param array $input
	 *
	 * @return tiponegocio
	 */
	public function store($input)
	{
		return tiponegocio::create($input);
	}

	/**
	 * Find tiponegocio by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|tiponegocio
	 */
	public function findtiponegocioById($id)
	{
		return tiponegocio::find($id);
	}

	/**
	 * Updates tiponegocio into database
	 *
	 * @param tiponegocio $tiponegocio
	 * @param array $input
	 *
	 * @return tiponegocio
	 */
	public function update($tiponegocio, $input)
	{
		$tiponegocio->fill($input);
		$tiponegocio->save();

		return $tiponegocio;
	}
}