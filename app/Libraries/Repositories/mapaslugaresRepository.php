<?php

namespace App\Libraries\Repositories;


use App\Models\mapaslugares;
use Illuminate\Support\Facades\Schema;

class mapaslugaresRepository
{

	/**
	 * Returns all mapaslugares
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return mapaslugares::all();
	}

	public function search($input)
    {
        $query = mapaslugares::query();

        $columns = Schema::getColumnListing('mapaslugares');
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
	 * Stores mapaslugares into database
	 *
	 * @param array $input
	 *
	 * @return mapaslugares
	 */
	public function store($input)
	{
		return mapaslugares::create($input);
	}

	/**
	 * Find mapaslugares by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|mapaslugares
	 */
	public function findmapaslugaresById($id)
	{
		return mapaslugares::find($id);
	}

	/**
	 * Updates mapaslugares into database
	 *
	 * @param mapaslugares $mapaslugares
	 * @param array $input
	 *
	 * @return mapaslugares
	 */
	public function update($mapaslugares, $input)
	{
		$mapaslugares->fill($input);
		$mapaslugares->save();

		return $mapaslugares;
	}
}