<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'LibrosController@index');
Route::get('error',function(){
			abort(500);
			});


Auth::routes();

Route::get('/home', 'UsersController@index');

Route::resource('/libros', 'LibrosController'); //debemos crear esta carpeta materials(donde estan las vistas)

Route::resource('/prestamos', 'PrestamosController'); //debemos crear esta carpeta comentarios

Route::resource('/users', 'UsersController');//debemos crear esta carpeta users

Route::get('/reportes/estadistico','ReportesController@index');//con el metodo index
Route::get('pdf',function(){
	$pdf=PDF::loadView('libros');
	return $pdf->stream('libros');
});