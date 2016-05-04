<?php

namespace App\Libraries\Repositories;


use App\Models\ppm_pais;
use Illuminate\Support\Facades\Schema;

class ppm_paisRepository
{

	/**
	 * Returns all ppm_pais
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return ppm_pais::all();
	}

	public function search($input)
    {
        $query = ppm_pais::query();

        $columns = Schema::getColumnListing('ppm_pais');
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
	 * Stores ppm_pais into database
	 *
	 * @param array $input
	 *
	 * @return ppm_pais
	 */
	public function store($input)
	{
		return ppm_pais::create($input);
	}

	/**
	 * Find ppm_pais by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|ppm_pais
	 */
	public function findppm_paisById($id)
	{
		return ppm_pais::find($id);
	}

	/**
	 * Updates ppm_pais into database
	 *
	 * @param ppm_pais $ppmPais
	 * @param array $input
	 *
	 * @return ppm_pais
	 */
	public function update($ppmPais, $input)
	{
		$ppmPais->fill($input);
		$ppmPais->save();

		return $ppmPais;
	}
}