<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/clients','ClientsController@create');

Route::get('/clients', 'ClientsController@list');

Route::get('/clients/{id}','ClientsController@acha');

Route::delete('/clients/{id}','ClientsController@delete');

Route::patch('/clients/{id}','ClientsController@update');

Route::post('/livros', 'LivrosController@create');

Route::get('/livros', 'LivrosController@list');

Route::get('/livros/{id}','LivrosController@acha');

Route::delete('livros/{id}', 'LivrosController@deleta');

Route::patch('livros/{id}', 'LivrosController@update');

Route::apiResource('recursos', 'EmprestimosController');