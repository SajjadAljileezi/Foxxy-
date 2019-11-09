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
Route::get('add','ClientController@index');
Route::get('callback','CallbackController@index');
Route::get('socialmedia','SocialmediaController@index');
Route::get('reviewmanagment','ReviewController@index');
Route::get('script','ScriptController@index');
Route::get('show/{id}','ClientController@show');
Route::get('showleads/{id}','LeadController@show');
Route::get('closers','ClosersController@closers');
Route::get('all','ClosersController@all');
Route::get('unactive','ClosersController@unactive');
Route::get('leadss', 'LeadController@index');
Route::get('today', 'LeadController@today');
Route::get('closernames', 'ClosersController@shows');
Route::get('closernames/{id}', 'ClosersController@show');


