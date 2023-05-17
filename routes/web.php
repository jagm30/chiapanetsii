<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('usuarios', 'UserController');
Route::resource('clientes', 'ClienteController');
Route::get('tickets/finalizar/{id}', 'TicketController@finalizar')->name('finalizar');
Route::resource('tickets', 'TicketController');
Route::resource('ticketseguimientos', 'TicketseguimientoController');
Route::resource('departamentos', 'DepartamentoController');
Route::resource('catservicios', 'CatservicioController');
Route::get('hojaservicios/reportePDF/{id}', 'HojaservicioController@reportePDF')->name('reportePDF');
Route::resource('hojaservicios', 'HojaservicioController');
Route::resource('articulos', 'ArticuloController');
Route::resource('secciones', 'SeccioneController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');