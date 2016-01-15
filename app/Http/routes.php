<?php
header('Access-Control-Allow-Origin: http://localhost:8100');
header('Access-Control-Allow-Credentials: true');
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');


Route::resource('api/pool','PoolsController',['middleware' => 'cors']);


Route::resource('api/pooloptions','PoolOptionsController',['middleware' => 'cors']);
Route::get('api/pooloption/addvote/{id}','PoolOptionsController@addVote',['middleware' => 'cors']);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

