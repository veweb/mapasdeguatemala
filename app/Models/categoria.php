<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    
	public $table = "categorias";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre"
	];

	public static $rules = [
	    "nombre" => "required"
	];

}
