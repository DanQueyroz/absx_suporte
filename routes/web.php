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
    return redirect()->route('chamados.index');
});

/**
 * Vendedores
 */
Route::group(['namespace' => 'Vendedor', 'prefix' => '/vendedores'], function() {
    Route::get('/', 'VendedorController@index')->name('vendedores.index');
    Route::get('/criar', 'VendedorController@create')->name('vendedores.criar');
    Route::post('/adicionar', 'VendedorController@store')->name('vendedores.adicionar');
    Route::get('/editar/{id}', 'VendedorController@show')->name('vendedores.editar');
    Route::put('/atualizar/{id}', 'VendedorController@edit')->name('vendedores.atualizar');
    Route::delete('/excluir/{id}', 'VendedorController@delete')->name('vendedores.excluir');
});

/**
 * Chamados
 */
Route::group(['namespace' => 'Chamado', 'prefix' => '/chamados'], function() {
    Route::get('/', 'ChamadoController@index')->name('chamados.index');
    Route::get('/criar', 'ChamadoController@create')->name('chamados.criar');
    Route::post('/adicionar', 'ChamadoController@store')->name('chamados.adicionar');
    Route::get('/editar/{id}', 'ChamadoController@show')->name('chamados.editar');
    Route::put('/atualizar/{id}', 'ChamadoController@edit')->name('chamados.atualizar');
    Route::delete('/excluir/{id}', 'ChamadoController@delete')->name('chamados.excluir');
});
