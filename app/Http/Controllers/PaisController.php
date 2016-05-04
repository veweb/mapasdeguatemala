<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePaisRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PaisRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PaisController extends AppBaseController
{

	/** @var  PaisRepository */
	private $paisRepository;

	function __construct(PaisRepository $paisRepo)
	{
		$this->paisRepository = $paisRepo;
	}

	/**
	 * Display a listing of the Pais.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->paisRepository->search($input);

		$pais = $result[0];

		$attributes = $result[1];

		return view('pais.index')
		    ->with('pais', $pais)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Pais.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pais.create');
	}

	/**
	 * Store a newly created Pais in storage.
	 *
	 * @param CreatePaisRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePaisRequest $request)
	{
        $input = $request->all();

		$pais = $this->paisRepository->store($input);

		Flash::message('Pais saved successfully.');

		return redirect(route('pais.index'));
	}

	/**
	 * Display the specified Pais.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pais = $this->paisRepository->findPaisById($id);

		if(empty($pais))
		{
			Flash::error('Pais not found');
			return redirect(route('pais.index'));
		}

		return view('pais.show')->with('pais', $pais);
	}

	/**
	 * Show the form for editing the specified Pais.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pais = $this->paisRepository->findPaisById($id);

		if(empty($pais))
		{
			Flash::error('Pais not found');
			return redirect(route('pais.index'));
		}

		return view('pais.edit')->with('pais', $pais);
	}

	/**
	 * Update the specified Pais in storage.
	 *
	 * @param  int    $id
	 * @param CreatePaisRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePaisRequest $request)
	{
		$pais = $this->paisRepository->findPaisById($id);

		if(empty($pais))
		{
			Flash::error('Pais not found');
			return redirect(route('pais.index'));
		}

		$pais = $this->paisRepository->update($pais, $request->all());

		Flash::message('Pais updated successfully.');

		return redirect(route('pais.index'));
	}

	/**
	 * Remove the specified Pais from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pais = $this->paisRepository->findPaisById($id);

		if(empty($pais))
		{
			Flash::error('Pais not found');
			return redirect(route('pais.index'));
		}

		$pais->delete();

		Flash::message('Pais deleted successfully.');

		return redirect(route('pais.index'));
	}

	public function getPais(Request $request, $id){
		if($request->ajax()){
			$departamentos = Departamento::departamentos($id);
			return response()->json();
		}
	}

}
