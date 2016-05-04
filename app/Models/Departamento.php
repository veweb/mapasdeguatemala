<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    
	public $table = "departamentos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "pais_id",
		"nombre"
	];

	public static $rules = [
	    "pais_id" => "required",
		"nombre" => "required"
	];

	public static function departamentos($id){
		return Departamento::where('pais_id','=',$id)
		->get();
	}

	

}
