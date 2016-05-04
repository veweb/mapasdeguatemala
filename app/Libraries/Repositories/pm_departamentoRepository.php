<?php

namespace App\Libraries\Repositories;


use App\Models\pm_departamento;
use Illuminate\Support\Facades\Schema;

class pm_departamentoRepository
{

	/**
	 * Returns all pm_departamentos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return pm_departamento::all();
	}

	public function search($input)
    {
        $query = pm_departamento::query();

        $columns = Schema::getColumnListing('pm_departamentos');
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
	 * Stores pm_departamento into database
	 *
	 * @param array $input
	 *
	 * @return pm_departamento
	 */
	public function store($input)
	{
		return pm_departamento::create($input);
	}

	/**
	 * Find pm_departamento by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|pm_departamento
	 */
	public function findpm_departamentoById($id)
	{
		return pm_departamento::find($id);
	}

	/**
	 * Updates pm_departamento into database
	 *
	 * @param pm_departamento $pmDepartamento
	 * @param array $input
	 *
	 * @return pm_departamento
	 */
	public function update($pmDepartamento, $input)
	{
		$pmDepartamento->fill($input);
		$pmDepartamento->save();

		return $pmDepartamento;
	}
}