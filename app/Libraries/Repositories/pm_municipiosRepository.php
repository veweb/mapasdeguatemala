<?php

namespace App\Libraries\Repositories;


use App\Models\pm_municipios;
use Illuminate\Support\Facades\Schema;

class pm_municipiosRepository
{

	/**
	 * Returns all pm_municipios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return pm_municipios::all();
	}

	public function search($input)
    {
        $query = pm_municipios::query();

        $columns = Schema::getColumnListing('pm_municipios');
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
	 * Stores pm_municipios into database
	 *
	 * @param array $input
	 *
	 * @return pm_municipios
	 */
	public function store($input)
	{
		return pm_municipios::create($input);
	}

	/**
	 * Find pm_municipios by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|pm_municipios
	 */
	public function findpm_municipiosById($id)
	{
		return pm_municipios::find($id);
	}

	/**
	 * Updates pm_municipios into database
	 *
	 * @param pm_municipios $pmMunicipios
	 * @param array $input
	 *
	 * @return pm_municipios
	 */
	public function update($pmMunicipios, $input)
	{
		$pmMunicipios->fill($input);
		$pmMunicipios->save();

		return $pmMunicipios;
	}
}