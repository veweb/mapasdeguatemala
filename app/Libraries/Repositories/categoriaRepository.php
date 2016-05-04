<?php

namespace App\Libraries\Repositories;


use App\Models\categoria;
use Illuminate\Support\Facades\Schema;

class categoriaRepository
{

	/**
	 * Returns all categorias
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return categoria::all();
	}

	public function search($input)
    {
        $query = categoria::query();

        $columns = Schema::getColumnListing('categorias');
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
	 * Stores categoria into database
	 *
	 * @param array $input
	 *
	 * @return categoria
	 */
	public function store($input)
	{
		return categoria::create($input);
	}

	/**
	 * Find categoria by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|categoria
	 */
	public function findcategoriaById($id)
	{
		return categoria::find($id);
	}

	/**
	 * Updates categoria into database
	 *
	 * @param categoria $categoria
	 * @param array $input
	 *
	 * @return categoria
	 */
	public function update($categoria, $input)
	{
		$categoria->fill($input);
		$categoria->save();

		return $categoria;
	}
}