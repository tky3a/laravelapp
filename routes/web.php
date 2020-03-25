<?php

use Illuminate\Support\Facades\Route;
use App\Http\middleware\HelloMiddleware;

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

// hello routes
Route::get('/hello', 'HelloController@index');
Route::post('/hello', 'HelloController@post');
Route::get('/hello/rest','HelloController@rest');
Route::get('/hello/session', 'HelloController@ses_get');
Route::post('/hello/session', 'HelloController@ses_put');
Route::get('/hello/add', 'HelloController@add');
Route::post('/hello/add', 'HelloController@create');
Route::get('/hello/edit/{id}', 'HelloController@edit');
Route::post('/hello/edit', 'HelloController@update');
Route::get('/hello/{id}', 'HelloController@show');
Route::post('/hello/delete', 'HelloController@delete');



// person routes
Route::get('/person', 'PersonController@index');
Route::get('/person/add', 'PersonController@add');
Route::post('/person/create', 'PersonController@create');
Route::get('/person/edit/{id}', 'PersonController@edit');
Route::post('/person/edit/{id}', 'PersonController@update');
Route::get('/person/{id}', 'PersonController@find');
Route::post('/person/{id}', 'PersonController@search');
Route::post('/person', 'PersonController@delete');

// board routes
Route::get('/boards', 'BoardController@index');
Route::get('/boards/add', 'BoardController@add');
Route::post('/boards/add', 'BoardController@create');

// リソースを使ったルーティング
// restapp routes
Route::resource('rest', 'RestappController');