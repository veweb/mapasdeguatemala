<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecategoriaRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\categoriaRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class categoriaController extends AppBaseController
{

	/** @var  categoriaRepository */
	private $categoriaRepository;

	function __construct(categoriaRepository $categoriaRepo)
	{
		$this->categoriaRepository = $categoriaRepo;
	}

	/**
	 * Display a listing of the categoria.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->categoriaRepository->search($input);

		$categorias = $result[0];

		$attributes = $result[1];

		return view('categorias.index')
		    ->with('categorias', $categorias)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new categoria.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categorias.create');
	}

	/**
	 * Store a newly created categoria in storage.
	 *
	 * @param CreatecategoriaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatecategoriaRequest $request)
	{
        $input = $request->all();

		$categoria = $this->categoriaRepository->store($input);

		Flash::message('categoria saved successfully.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Display the specified categoria.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = $this->categoriaRepository->findcategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('categoria not found');
			return redirect(route('categorias.index'));
		}

		return view('categorias.show')->with('categoria', $categoria);
	}

	/**
	 * Show the form for editing the specified categoria.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = $this->categoriaRepository->findcategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('categoria not found');
			return redirect(route('categorias.index'));
		}

		return view('categorias.edit')->with('categoria', $categoria);
	}

	/**
	 * Update the specified categoria in storage.
	 *
	 * @param  int    $id
	 * @param CreatecategoriaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatecategoriaRequest $request)
	{
		$categoria = $this->categoriaRepository->findcategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('categoria not found');
			return redirect(route('categorias.index'));
		}

		$categoria = $this->categoriaRepository->update($categoria, $request->all());

		Flash::message('categoria updated successfully.');

		return redirect(route('categorias.index'));
	}

	/**
	 * Remove the specified categoria from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = $this->categoriaRepository->findcategoriaById($id);

		if(empty($categoria))
		{
			Flash::error('categoria not found');
			return redirect(route('categorias.index'));
		}

		$categoria->delete();

		Flash::message('categoria deleted successfully.');

		return redirect(route('categorias.index'));
	}

}
