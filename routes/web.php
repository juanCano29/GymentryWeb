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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('base');
});

// ejemplo consulta a mongo
Route::get('/prueba', 'prueba@consulta1');

// ejemplo consulta a mysql
Route::get('/prueba2', 'prueba@consulta2');

Route::get('/clientes', function(){
	return view('registro1');
});
Route::post('/registrarcliente', 'clientescontroller@guardarcliente');
Route::get('/listaclientes', 'clientescontroller@clientes');
Route::get('/clienteseleccionado/{id}', 'clientescontroller@clienteselec');