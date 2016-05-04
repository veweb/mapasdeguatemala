<?php

namespace App\Libraries\Repositories;


use App\Models\pm_pais;
use Illuminate\Support\Facades\Schema;

class pm_paisRepository
{

	/**
	 * Returns all pm_pais
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return pm_pais::all();
	}

	public function search($input)
    {
        $query = pm_pais::query();

        $columns = Schema::getColumnListing('pm_pais');
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
	 * Stores pm_pais into database
	 *
	 * @param array $input
	 *
	 * @return pm_pais
	 */
	public function store($input)
	{
		return pm_pais::create($input);
	}

	/**
	 * Find pm_pais by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|pm_pais
	 */
	public function findpm_paisById($id)
	{
		return pm_pais::find($id);
	}

	/**
	 * Updates pm_pais into database
	 *
	 * @param pm_pais $pmPais
	 * @param array $input
	 *
	 * @return pm_pais
	 */
	public function update($pmPais, $input)
	{
		$pmPais->fill($input);
		$pmPais->save();

		return $pmPais;
	}
}