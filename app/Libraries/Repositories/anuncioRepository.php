<?php

namespace App\Libraries\Repositories;


use App\Models\anuncio;
use Illuminate\Support\Facades\Schema;

class anuncioRepository
{

	/**
	 * Returns all anuncios
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return anuncio::all();
	}

	public function search($input)
    {
        $query = anuncio::query();

        $columns = Schema::getColumnListing('anuncios');
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
	 * Stores anuncio into database
	 *
	 * @param array $input
	 *
	 * @return anuncio
	 */
	public function store($input)
	{
		return anuncio::create($input);
	}

	/**
	 * Find anuncio by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|anuncio
	 */
	public function findanuncioById($id)
	{
		return anuncio::find($id);
	}

	/**
	 * Updates anuncio into database
	 *
	 * @param anuncio $anuncio
	 * @param array $input
	 *
	 * @return anuncio
	 */
	public function update($anuncio, $input)
	{
		$anuncio->fill($input);
		$anuncio->save();

		return $anuncio;
	}
}