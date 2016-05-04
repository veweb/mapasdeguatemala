<?php

namespace App\Libraries\Repositories;


use App\Models\Departamento;
use Illuminate\Support\Facades\Schema;

class DepartamentoRepository
{

	/**
	 * Returns all Departamentos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Departamento::all();
	}

	public function search($input)
    {
        $query = Departamento::query();

        $columns = Schema::getColumnListing('departamentos');
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
	 * Stores Departamento into database
	 *
	 * @param array $input
	 *
	 * @return Departamento
	 */
	public function store($input)
	{
		return Departamento::create($input);
	}

	/**
	 * Find Departamento by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Departamento
	 */
	public function findDepartamentoById($id)
	{
		return Departamento::find($id);
	}

	/**
	 * Updates Departamento into database
	 *
	 * @param Departamento $departamento
	 * @param array $input
	 *
	 * @return Departamento
	 */
	public function update($departamento, $input)
	{
		$departamento->fill($input);
		$departamento->save();

		return $departamento;
	}
}