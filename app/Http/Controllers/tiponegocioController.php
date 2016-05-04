<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatetiponegocioRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\tiponegocioRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class tiponegocioController extends AppBaseController
{

	/** @var  tiponegocioRepository */
	private $tiponegocioRepository;

	function __construct(tiponegocioRepository $tiponegocioRepo)
	{
		$this->tiponegocioRepository = $tiponegocioRepo;
	}

	/**
	 * Display a listing of the tiponegocio.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->tiponegocioRepository->search($input);

		$tiponegocios = $result[0];

		$attributes = $result[1];

		return view('tiponegocios.index')
		    ->with('tiponegocios', $tiponegocios)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new tiponegocio.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tiponegocios.create');
	}

	/**
	 * Store a newly created tiponegocio in storage.
	 *
	 * @param CreatetiponegocioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatetiponegocioRequest $request)
	{
        $input = $request->all();

		$tiponegocio = $this->tiponegocioRepository->store($input);

		Flash::message('tiponegocio saved successfully.');

		return redirect(route('tiponegocios.index'));
	}

	/**
	 * Display the specified tiponegocio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tiponegocio = $this->tiponegocioRepository->findtiponegocioById($id);

		if(empty($tiponegocio))
		{
			Flash::error('tiponegocio not found');
			return redirect(route('tiponegocios.index'));
		}

		return view('tiponegocios.show')->with('tiponegocio', $tiponegocio);
	}

	/**
	 * Show the form for editing the specified tiponegocio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tiponegocio = $this->tiponegocioRepository->findtiponegocioById($id);

		if(empty($tiponegocio))
		{
			Flash::error('tiponegocio not found');
			return redirect(route('tiponegocios.index'));
		}

		return view('tiponegocios.edit')->with('tiponegocio', $tiponegocio);
	}

	/**
	 * Update the specified tiponegocio in storage.
	 *
	 * @param  int    $id
	 * @param CreatetiponegocioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatetiponegocioRequest $request)
	{
		$tiponegocio = $this->tiponegocioRepository->findtiponegocioById($id);

		if(empty($tiponegocio))
		{
			Flash::error('tiponegocio not found');
			return redirect(route('tiponegocios.index'));
		}

		$tiponegocio = $this->tiponegocioRepository->update($tiponegocio, $request->all());

		Flash::message('tiponegocio updated successfully.');

		return redirect(route('tiponegocios.index'));
	}

	/**
	 * Remove the specified tiponegocio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tiponegocio = $this->tiponegocioRepository->findtiponegocioById($id);

		if(empty($tiponegocio))
		{
			Flash::error('tiponegocio not found');
			return redirect(route('tiponegocios.index'));
		}

		$tiponegocio->delete();

		Flash::message('tiponegocio deleted successfully.');

		return redirect(route('tiponegocios.index'));
	}

}
