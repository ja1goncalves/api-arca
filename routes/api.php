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

Route::post('User-update', function(){

   $user = app()->make(\App\Services\UserService::class);
    return $user->update(['password' => bcrypt('m3@arca#18')],3);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user-logged', 'UsersController@index');

Route::group(['middleware' => ['auth:api']], function(){

    Route::resource('people', 'PeopleController', ['except' => ['create', 'edit']]);
    Route::resource('analysisResults', 'AnalysisResultsController', ['except' => ['create', 'edit']]);

});
Route::get('/', function () {
    return view('welcome');
});
