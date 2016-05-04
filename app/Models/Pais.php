<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pais extends Model
{
    
	public $table = "pais";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "codigo",
		"nombre"
	];

	public static $rules = [
	    "codigo" => "required",
		"nombre" => "required"
	];



	

}
