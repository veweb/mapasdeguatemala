<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    
	public $table = "municipios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "departamento_id",
		"nombre"
	];

	public static $rules = [
	    "departamento_id" => "required",
		"nombre" => "required"
	];

	public static function municipios($id){
		return Municipio::where('departamento_id','=',$id)
		->get();
	}
	public static function getNombre($id){
		
	}

}
