<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDepartamentoRequest;
use Illuminate\Http\Request;
use App\Models\Pais;
use App\Libraries\Repositories\DepartamentoRepository;
use Mitul\Controller\AppBaseController;
use App\Models\Departamento;
use Response;
use Flash;


class DepartamentoController extends AppBaseController
{

	/** @var  DepartamentoRepository */
	private $departamentoRepository;

	function __construct(DepartamentoRepository $departamentoRepo)
	{
		$this->departamentoRepository = $departamentoRepo;
	}

	/**
	 * Display a listing of the Departamento.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->departamentoRepository->search($input);

		$departamentos = $result[0];

		$attributes = $result[1];

		return view('departamentos.index')
		    ->with('departamentos', $departamentos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Departamento.
	 *
	 * @return Response
	 */
	public function create()
	{
		$paises = Pais::lists('nombre','id');
		return view('departamentos.create',compact('paises'));
	}

	/**
	 * Store a newly created Departamento in storage.
	 *
	 * @param CreateDepartamentoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDepartamentoRequest $request)
	{
        $input = $request->all();

		$departamento = $this->departamentoRepository->store($input);

		Flash::message('Departamento saved successfully.');

		return redirect(route('departamentos.index'));
	}

	/**
	 * Display the specified Departamento.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$departamento = $this->departamentoRepository->findDepartamentoById($id);

		if(empty($departamento))
		{
			Flash::error('Departamento not found');
			return redirect(route('departamentos.index'));
		}

		return view('departamentos.show')->with('departamento', $departamento);
	}

	/**
	 * Show the form for editing the specified Departamento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$departamento = $this->departamentoRepository->findDepartamentoById($id);

		if(empty($departamento))
		{
			Flash::error('Departamento not found');
			return redirect(route('departamentos.index'));
		}

		return view('departamentos.edit')->with('departamento', $departamento);
	}

	/**
	 * Update the specified Departamento in storage.
	 *
	 * @param  int    $id
	 * @param CreateDepartamentoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDepartamentoRequest $request)
	{
		$departamento = $this->departamentoRepository->findDepartamentoById($id);

		if(empty($departamento))
		{
			Flash::error('Departamento not found');
			return redirect(route('departamentos.index'));
		}

		$departamento = $this->departamentoRepository->update($departamento, $request->all());

		Flash::message('Departamento updated successfully.');

		return redirect(route('departamentos.index'));
	}

	/**
	 * Remove the specified Departamento from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$departamento = $this->departamentoRepository->findDepartamentoById($id);

		if(empty($departamento))
		{
			Flash::error('Departamento not found');
			return redirect(route('departamentos.index'));
		}

		$departamento->delete();

		Flash::message('Departamento deleted successfully.');

		return redirect(route('departamentos.index'));
	}
	

}
