<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemapaslugaresRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\mapaslugaresRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use App\Models\mapaslugares;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use \Input as Input; 
use File;

class mapaslugaresController extends AppBaseController
{

	/** @var  mapaslugaresRepository */
	private $mapaslugaresRepository;

	function __construct(mapaslugaresRepository $mapaslugaresRepo)
	{
		$this->mapaslugaresRepository = $mapaslugaresRepo;
	}

	/**
	 * Display a listing of the mapaslugares.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->mapaslugaresRepository->search($input);

		$mapaslugares = $result[0];

		$attributes = $result[1];

		return view('mapaslugares.index')
		    ->with('mapaslugares', $mapaslugares)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new mapaslugares.
	 *
	 * @return Response
	 */
	public function create()
	{
		$paises = Pais::lists('nombre','id');
		$departamentos = Departamento::lists('nombre','id');
		$municipios = Municipio::lists('nombre','id');
		return view('mapaslugares.create',compact('paises','departamentos','municipios'));
	}

	/**
	 * Store a newly created mapaslugares in storage.
	 *
	 * @param CreatemapaslugaresRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatemapaslugaresRequest $request)
	{
       

        
        if(Input::hasFile('imagen')){
        	$file = Input::file('imagen');
        	$file->move('images/upload/mapas/',$file->getClientOriginalName());
        		
      
        }

		$mapaslugares = new Mapaslugares();
		$mapaslugares->nombre = $request->nombre;
		$mapaslugares->estado = $request->estado;
		$mapaslugares->pais_id = $request->pais_id;
		$mapaslugares->departamento_id = $request->departamento_id;
		$mapaslugares->municipio_id = $request->municipio_id;
		$mapaslugares->imagen = trim($file->getClientOriginalName());
		$mapaslugares->save();	


		Flash::message('Mapa guardado correctamente.');

		return redirect(route('mapaslugares.index'));
	}

	/**
	 * Display the specified mapaslugares.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mapaslugares = $this->mapaslugaresRepository->findmapaslugaresById($id);

		if(empty($mapaslugares))
		{
			Flash::error('mapaslugares not found');
			return redirect(route('mapaslugares.index'));
		}

		return view('mapaslugares.show')->with('mapaslugares', $mapaslugares);
	}

	/**
	 * Show the form for editing the specified mapaslugares.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mapaslugares = $this->mapaslugaresRepository->findmapaslugaresById($id);

		if(empty($mapaslugares))
		{
			Flash::error('mapaslugares not found');
			return redirect(route('mapaslugares.index'));
		}

		return view('mapaslugares.edit')->with('mapaslugares', $mapaslugares);
	}

	/**
	 * Update the specified mapaslugares in storage.
	 *
	 * @param  int    $id
	 * @param CreatemapaslugaresRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatemapaslugaresRequest $request)
	{
		$mapaslugares = $this->mapaslugaresRepository->findmapaslugaresById($id);

		if(empty($mapaslugares))
		{
			Flash::error('mapaslugares not found');
			return redirect(route('mapaslugares.index'));
		}

		$mapaslugares = $this->mapaslugaresRepository->update($mapaslugares, $request->all());

		Flash::message('mapaslugares updated successfully.');

		return redirect(route('mapaslugares.index'));
	}



	/**
	 * Remove the specified mapaslugares from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
			
		$mapaslugares = $this->mapaslugaresRepository->findmapaslugaresById($id);
		$mapas =Mapaslugares::find($id);
	
	

		if(empty($mapaslugares))
		{
			Flash::error('mapa no funciona');
			return redirect(route('mapaslugares.index'));
		}
        File::delete('images/upload/mapas/'.$mapas->imagen);
		$mapaslugares->delete();

		Flash::message('Mapa eliminado correctamente.');

		return redirect(route('mapaslugares.index'));
	}

	public function getDepartamentos(Request $request, $id){
		if($request->ajax()){
			$departamentos = Departamento::departamentos($id);
			return response()->json($departamentos);
		}
	}

	public function getMunicipios(Request $request, $id){
		if($request->ajax()){
			$municipios = Municipio::municipios($id);
			return response()->json($municipios);
		}
	}

	public function upload(Request $request, $id){
		echo "uploader";
	}

}
