<?php

namespace App\Libraries\Repositories;


use App\Models\Mapasimagenes;
use Illuminate\Support\Facades\Schema;

class MapasimagenesRepository
{

	/**
	 * Returns all Mapasimagenes
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Mapasimagenes::all();
	}

	public function search($input)
    {
        $query = Mapasimagenes::query();

        $columns = Schema::getColumnListing('mapasimagenes');
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
	 * Stores Mapasimagenes into database
	 *
	 * @param array $input
	 *
	 * @return Mapasimagenes
	 */
	public function store($input)
	{
		return Mapasimagenes::create($input);
	}

	/**
	 * Find Mapasimagenes by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Mapasimagenes
	 */
	public function findMapasimagenesById($id)
	{
		return Mapasimagenes::find($id);
	}

	/**
	 * Updates Mapasimagenes into database
	 *
	 * @param Mapasimagenes $mapasimagenes
	 * @param array $input
	 *
	 * @return Mapasimagenes
	 */
	public function update($mapasimagenes, $input)
	{
		$mapasimagenes->fill($input);
		$mapasimagenes->save();

		return $mapasimagenes;
	}
}