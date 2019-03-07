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

Auth::routes();

//////Pruebas de consultas///////
Route::get('/apis', 'HomeController@apis')->name('apis');

///////////////Rutas de administración ///////////////////////
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/temas/{url}', 'HomeController@juego')->name('home');
Route::get('/dashboard/temas', 'HomeController@dash')->name('home');


///////Consultas a las preguntas////////////
Route::post('/juego/preguntas', 'PreguntaController@get');

//////Consulta a los temas////////
Route::get('/apis/temas', 'TemaController@get');
Route::put('/apis/temas/edit', 'TemaController@edit');
