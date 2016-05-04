<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemunicipioRequest;
use App\Models\Municipio;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class MunicipioController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$query = Municipio::query();
        $columns = Schema::getColumnListing('$TABLE_NAME$');
        $attributes = array();

        foreach($columns as $attribute){
            if($request[$attribute] == true)
            {
                $query->where($attribute, $request[$attribute]);
                $attributes[$attribute] =  $request[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        $municipios = $query->get();

        return view('municipios.index')
            ->with('municipios', $municipios)
            ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Municipio.
	 *
	 * @return Response
	 */
	public function create()
	{
		$departamentos = Departamento::lists('nombre','id');
		return view('municipios.create',compact('departamentos'));
	}

	/**
	 * Store a newly created Municipio in storage.
	 *
	 * @param CreateMunicipioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMunicipioRequest $request)
	{
        $input = $request->all();

		$municipio = Municipio::create($input);

		Flash::message('Municipio saved successfully.');

		return redirect(route('municipios.index'));
	}

	/**
	 * Display the specified Municipio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$municipio = Municipio::find($id);

		if(empty($municipio))
		{
			Flash::error('Municipio not found');
			return redirect(route('municipios.index'));
		}

		return view('municipios.show')->with('municipio', $municipio);
	}

	/**
	 * Show the form for editing the specified Municipio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$municipio = Municipio::find($id);

		if(empty($municipio))
		{
			Flash::error('Municipio not found');
			return redirect(route('municipios.index'));
		}

		return view('municipios.edit')->with('municipio', $municipio);
	}

	/**
	 * Update the specified Municipio in storage.
	 *
	 * @param  int    $id
	 * @param CreateMunicipioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateMunicipioRequest $request)
	{
		/** @var Municipio $municipio */
		$municipio = Municipio::find($id);

		if(empty($municipio))
		{
			Flash::error('Municipio not found');
			return redirect(route('municipios.index'));
		}

		$municipio->fill($request->all());
		$municipio->save();

		Flash::message('Municipio updated successfully.');

		return redirect(route('municipios.index'));
	}

	/**
	 * Remove the specified Municipio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Municipio $municipio */
		$municipio = Municipio::find($id);

		if(empty($municipio))
		{
			Flash::error('Municipio not found');
			return redirect(route('municipios.index'));
		}

		$municipio->delete();

		Flash::message('Municipio deleted successfully.');

		return redirect(route('municipios.index'));
	}
}
