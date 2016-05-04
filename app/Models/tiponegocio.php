<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiponegocio extends Model
{
    
	public $table = "tiponegocios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "categoria_id"
	];

	public static $rules = [
	    "categoria_id" => "nombre:string"
	];

}
