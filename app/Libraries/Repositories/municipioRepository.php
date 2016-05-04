<?php

namespace App\Libraries\Repositories;


use App\Models\Municipio;
use Illuminate\Support\Facades\Schema;

class MunicipioRepository
{

	/**
	 * Returns all Municipios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Municipio::all();
	}

	public function search($input)
    {
        $query = Municipio::query();

        $columns = Schema::getColumnListing('municipios');
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
	 * Stores Municipio into database
	 *
	 * @param array $input
	 *
	 * @return Municipio
	 */
	public function store($input)
	{
		return Municipio::create($input);
	}

	/**
	 * Find Municipio by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Municipio
	 */
	public function findMunicipioById($id)
	{
		return Municipio::find($id);
	}

	/**
	 * Updates Municipio into database
	 *
	 * @param Municipio $municipio
	 * @param array $input
	 *
	 * @return Municipio
	 */
	public function update($municipio, $input)
	{
		$municipio->fill($input);
		$municipio->save();

		return $municipio;
	}
}