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

Auth::routes(['verify' => true, 'register' => true]);

Route::get('/home', 'HomeController@index');
Route::get('/closer', 'ClosersController@index');
Route::get('/callback', 'HomeController@index');
Route::get('/leadcallback', 'HomeController@index');
Route::get('/script', 'HomeController@index');
Route::get('/leads', 'HomeController@index');


Route::get('/closerss', 'ClosersController@closers');

Route::get('/closers', 'HomeController@index');
Route::get('/socialmedia', 'HomeController@index');
Route::get('/reviewmanagment', 'HomeController@index');
Route::get('/show/{id}', 'HomeController@index');
Route::get('/showlead/{id}', 'HomeController@index');
Route::get('/showcloser/{id}', 'HomeController@index');
Route::get('/cname', 'HomeController@index');
Route::get('/closernames', 'ClosersController@shows');

Route::post('/add', 'ClientController@store');
Route::post('/addcname', 'ClosersController@store');
Route::post('/addlead', 'LeadController@store');
Route::patch('/script/{id}', 'ScriptController@update');
Route::patch('/add/{id}','ClientController@update');
Route::patch('/showlead/{id}','LeadController@update');
Route::patch('/showclosers/{id}','ClosersController@update');
Route::delete('/deletclosers/{id}','ClosersController@destroy');
Route::delete('/delete/{id}','ClientController@destroy');

