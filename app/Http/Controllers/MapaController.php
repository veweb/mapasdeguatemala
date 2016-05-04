<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\mapaslugares;
use App\Models\Categoria;
use App\Models\anuncio;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use DB;
use \Input as Input; 
use Response;

class MapaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		   	$idm = Input::get('idm');



		 


		   if ($request->input('categoria_id') != null ){

		   		$anuncios= anuncio::where('departamento_id',$request->input('departamento_id'))
		   					->where('municipio_id',$request->input('municipio_id'))
		   					->where('mapa_id',$request->input('lugar_id'))
		   					->where('categoria_id',$request->input('categoria_id'))
		   					->orderBy('titulo','Asc')
		   					->get();
		   	}				
		   	else
		   	{

		   		$anuncios= anuncio::where('departamento_id',$request->input('departamento_id'))
		   					->where('municipio_id',$request->input('municipio_id'))
		   					->where('mapa_id',$request->input('lugar_id'))
		   					->orderBy('titulo','Asc')
		   					->get();

		   	}			

		   					
			$total = count($anuncios);
			if($total != 0 ){
			   $mapa = mapaslugares::where('id',$request->input('lugar_id'))->get();
			   $imgMapa = $mapa[0]->imagen;			
			}
			else
			{
				$mapa = mapaslugares::where('id',$request->input('lugar_id'))->get();
				$totalm = count($mapa);
				if($totalm != 0){
			   		 $imgMapa = $mapa[0]->imagen;
			   		  $anuncios= anuncio::where('departamento_id',$request->input('departamento_id'))
		   				->where('municipio_id',$request->input('municipio_id'))
		   				->where('mapa_id',$request->input('lugar_id'))
		   				->get();	
			   	}
			   	else
			   	{	 
					
			   		
			   		 if($idm != null){
			   		  	 $map =  mapaslugares::where('id',$idm)->get();
			   		  	 $totm = count($map);
			   		  	 if($totm != 0){ 
			   		  	 	$imgMapa = $map[0]->imagen; 
			   		  	 	$anuncios= anuncio::where('departamento_id',$map[0]->departamento_id)
			   					->where('municipio_id',$map[0]->municipio_id)
			   					->where('mapa_id',$map[0]->id)
			   					->orderBy('titulo','Asc')
			   					->get();

			   		  	 } 
			   		  	 else { $imgMapa = "antigua-2016-map-01.jpg"; }
			   		  	 

					   }
					    else
					    {
					    	$imgMapa = "antigua-2016-map-01.jpg";
					    }




				}
			}
			$paises = Pais::lists('nombre','id');
			$departamentos = Departamento::lists('nombre','id');
			$municipios = Municipio::lists('nombre','id');
			
			return view('mapas',compact('paises','departamentos','municipios','anuncios','imgMapa'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
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

	public function getLugares(Request $request, $id){
		if($request->ajax()){
			$lugares = Mapaslugares::lugares($id);
			return response()->json($lugares);
		}
	}
	public function getMapas(Request $request, $id){
		if($request->ajax()){
			$lugares = DB::table('mapaslugares')->where('id',$id)->get();
		
			return response()->json($lugares);
		}
	}

	public function getCategorias(Request $request){
		if($request->ajax()){
			$categorias = DB::table('categorias')->get();
		
			return response()->json($categorias);

		
		}
	}
	public function manuncios(Request $request,$lugar_id){

		if($request->ajax()){
			$anuncios = DB::table('anuncios')
						->where('lugar_id',$lugar_id)
						->get();
			return view('manuncios',compact('anuncios'));			
		}

	}



}
