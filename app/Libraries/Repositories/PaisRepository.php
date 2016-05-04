<?php

namespace App\Libraries\Repositories;


use App\Models\Pais;
use Illuminate\Support\Facades\Schema;

class PaisRepository
{

	/**
	 * Returns all Pais
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Pais::all();
	}

	public function search($input)
    {
        $query = Pais::query();

        $columns = Schema::getColumnListing('pais');
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
	 * Stores Pais into database
	 *
	 * @param array $input
	 *
	 * @return Pais
	 */
	public function store($input)
	{
		return Pais::create($input);
	}

	/**
	 * Find Pais by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Pais
	 */
	public function findPaisById($id)
	{
		return Pais::find($id);
	}

	/**
	 * Updates Pais into database
	 *
	 * @param Pais $pais
	 * @param array $input
	 *
	 * @return Pais
	 */
	public function update($pais, $input)
	{
		$pais->fill($input);
		$pais->save();

		return $pais;
	}
}