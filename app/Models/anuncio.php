<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class anuncio extends Model
{
    
	public $table = "anuncios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "titulo",
		"descripcion",
		"imagen" ,
		"enlace",
		"estado",
		"pais_id",
		"departamento_id",
		"municipio_id",
		"categoria_id",
		"mapa_id",
		"posicion_mapa",
		"usuario_id"
	];

	public static $rules = [
	    "titulo" => "required",
		"descripcion" => "required",
		"imagen" => "required",
		"enlace" => "required",
		"estado" => "required",
		"departamento_id" => "required",
		"municipio_id" => "required",
		"categoria_id" => "required",
		"mapa_id" => "required",
		"posicion_mapa" => "required",
	];

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
    public function categoria($id){
        $datos = categoria::find($id); 	
        return $datos->nombre;
    }
    public function mapas($id){
        $datos = mapaslugares::find($id); 	
        return $datos->nombre;
    }

}
