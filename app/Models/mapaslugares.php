<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\Mapaslugares;


class mapaslugares extends Model
{
    
	public $table = "mapaslugares";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"imagen",
		"estado",
		"pais_id",
		"departamento_id",
		"municipio_id"
	];

	public static $rules = [
	    "nombre" => "required",
		"imagen" => "required|image|mimes:jpeg,jpg,png|min:1|max:64000",
		"estado" => "required",
		"departamento_id" => "required",
		"municipio_id" => "required"
	];




	public static function lugares($id){
		return mapaslugares::where('municipio_id','=',$id)
		->get();
	}
	public function pais($id){
        $datos = Pais::find($id); 	
        return $datos->nombre;
    }

    public function departamento($id){
        $datos = departamento::find($id); 	
        return $datos->nombre;
    }
    public function municipio($id){
        $datos = municipio::find($id); 	
        return $datos->nombre;
    }

}
