<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MapaController@index');
Route::post('/', 'MapaController@index');
Route::get('mdepartamentos/{id}','MapaController@getDepartamentos');
Route::get('mmunicipios/{id}','MapaController@getMunicipios');
Route::get('lugares/{id}','MapaController@getLugares');
Route::get('mapas/{id}','MapaController@getMapas');
Route::get('categorias/{id}','MapaController@getCategorias');

Route::get('home', 'HomeController@index');

Route::get('publico','PublicoController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('salir',['uses' =>'Auth\AuthController@getLogout','as' =>'logout']);
Route::get('ingresar',['uses' =>'Auth\AuthController@postRegister','as' =>'login']);
Route::get('registrarse',['uses' =>'Auth\AuthController@getRegister','as' => 'register']);

Route::get('mapas','mapaspublicidadController@create');



Route::resource('pais', 'PaisController');

Route::get('pais/{id}/delete', [
    'as' => 'pais.delete',
    'uses' => 'PaisController@destroy',
]);


Route::resource('departamentos', 'DepartamentoController');

Route::get('departamentos/{id}/delete', [
    'as' => 'departamentos.delete',
    'uses' => 'DepartamentoController@destroy',
]);



Route::resource('municipios', 'MunicipioController');

Route::get('municipios/{id}/delete', [
    'as' => 'municipios.delete',
    'uses' => 'MunicipioController@destroy',
]);


Route::resource('mapaslugares', 'mapaslugaresController');

Route::get('mapaslugares/{id}/delete', [
    'as' => 'mapaslugares.delete',
    'uses' => 'mapaslugaresController@destroy',
]);


Route::resource('mapaslugares', 'mapaslugaresController');
Route::get('mdepartamentos/{id}','mapaslugaresController@getDepartamentos');
Route::get('mmunicipios/{id}','mapaslugaresController@getMunicipios');
Route::get('mapaslugares/{id}/delete', [
    'as' => 'mapaslugares.delete',
    'uses' => 'mapaslugaresController@destroy',
]);
Route::post('upload','mapaslugaresController@upload');




Route::resource('tiponegocios', 'tiponegocioController');

Route::get('tiponegocios/{id}/delete', [
    'as' => 'tiponegocios.delete',
    'uses' => 'tiponegocioController@destroy',
]);


Route::resource('categorias', 'categoriaController');

Route::get('categorias/{id}/delete', [
    'as' => 'categorias.delete',
    'uses' => 'categoriaController@destroy',
]);


Route::resource('anuncios', 'anuncioController');



Route::get('anuncios/{id}/delete', [
    'as' => 'anuncios.delete',
    'uses' => 'anuncioController@destroy',
]);

Route::get('precios', function(){
    return view('precios');
});
