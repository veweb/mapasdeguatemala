<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateanuncioRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\anuncioRepository;
use Mitul\Controller\AppBaseController;
use Response;
use App\Models\mapaslugares;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Anuncio;
use App\Models\categoria;	
use Illuminate\Support\Facades\Auth;	
use Flash;
use \Input as Input; 
use File;

class anuncioController extends AppBaseController
{

	/** @var  anuncioRepository */
	private $anuncioRepository;

	function __construct(anuncioRepository $anuncioRepo)
	{
		$this->anuncioRepository = $anuncioRepo;
	}

	/**
	 * Display a listing of the anuncio.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $userId = Auth::user()->id;

	    $input = $request->all();
		$result = $this->anuncioRepository->search($input);

		$anuncios = $result[0];
		//$anuncios = Anuncio::where('usuaurio_id', '>', $userId2)->get();

		$attributes = $result[1];

		return view('anuncios.index')
		    ->with('anuncios', $anuncios,'userId')
		    ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new anuncio.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$departamentos = Departamento::lists('nombre','id');
		$municipios = Municipio::lists('nombre','id');
		$categorias = Categoria::lists('nombre','id');
		$mapas = Mapaslugares::lists('nombre','id');
		return view('anuncios.create',compact('departamentos','municipios','categorias','mapas'));
	}

	/**
	 * Store a newly created anuncio in storage.
	 *
	 * @param CreateanuncioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateanuncioRequest $request)
	{
      

        if(Input::hasFile('imagen')){
        	$file = Input::file('imagen');
        	$file->move('images/upload/anucios/',$file->getClientOriginalName());
        		
      
        }
        $userId = Auth::user()->id;

		$anuncio = new Anuncio();
		$anuncio->titulo = $request->titulo;
		$anuncio->descripcion = $request->descripcion;
		$anuncio->imagen = $file->getClientOriginalName();
		$anuncio->enlace = $request->enlace;
		$anuncio->estado = $request->estado;
		$anuncio->pais_id = 1;
		$anuncio->departamento_id = $request->departamento_id;
		$anuncio->municipio_id = $request->municipio_id;
		$anuncio->mapa_id = $request->mapa_id;
		$anuncio->categoria_id = $request->categoria_id;
		$anuncio->posicion_mapa = $request->posicion_mapa;
		$anuncio->usuario_id = $userId;
		$anuncio->save();


		Flash::message('anuncio guardado y publicado satisfactoriamente.');
	

		return redirect(route('anuncios.index'));
	}

	/**
	 * Display the specified anuncio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$anuncio = $this->anuncioRepository->findanuncioById($id);

		if(empty($anuncio))
		{
			Flash::error('anuncio not found');
			return redirect(route('anuncios.index'));
		}

		return view('anuncios.show')->with('anuncio', $anuncio);
	}
	public function lista(){
		$userId = Auth::user()->id;

		$anuncio = $this->anuncioRepository->findanuncioByUsuarioId($userId);

		if(empty($anuncios))
		{
			Flash::error('anuncio not found');
			return redirect(route('anuncios.lista'));
		}

		return view('anuncios.lista')->with('anuncio', $anuncio);

	}

	public function precios(){

		return view('anuncios.precios');

	}

	/**
	 * Show the form for editing the specified anuncio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		
		$departamentos = Departamento::lists('nombre','id');
		$municipios = Municipio::lists('nombre','id');
		$categorias = Categoria::lists('nombre','id');
		$mapas = Mapaslugares::lists('nombre','id');
		$anuncio = $this->anuncioRepository->findanuncioById($id);

		if(empty($anuncio))
		{
			Flash::error('anuncio not found');
			return redirect(route('anuncios.index'));
		}

		return view('anuncios.edit',compact('anuncio', $anuncio,'departamentos','municipios','categorias','mapas'));
	}

	/**
	 * Update the specified anuncio in storage.
	 *
	 * @param  int    $id
	 * @param CreateanuncioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateanuncioRequest $request)
	{
		$anuncio = $this->anuncioRepository->findanuncioById($id);

		if(empty($anuncio))
		{
			Flash::error('anuncio not found');
			return redirect(route('anuncios.index'));
		}

		$anuncio = $this->anuncioRepository->update($anuncio, $request->all());
		

		Flash::message('anuncio updated successfully.');

		return redirect(route('anuncios.index'));
	}

	/**
	 * Remove the specified anuncio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$anuncio = $this->anuncioRepository->findanuncioById($id);

		if(empty($anuncio))
		{
			Flash::error('anuncio not found');
			return redirect(route('anuncios.index'));
		}

		$anuncio->delete();

		Flash::message('anuncio deleted successfully.');

		return redirect(route('anuncios.index'));
	}

}
