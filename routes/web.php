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
    return view('home');
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
