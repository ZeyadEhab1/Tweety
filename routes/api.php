<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\User;
use App\Tweet;
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
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');

Route::group (['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout','AuthController@logout');
    Route::get('/tweets', 'ApiTweetController@index');
    Route::post('/tweets', 'ApiTweetController@store');

    Route::post('/tweets/{tweet}/like', 'ApiTweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'ApiTweetLikesController@destroy');

    Route::post(
        '/profiles/{user}/follow',
        'ApiFollowsController@store'
    ); //when i did it using the username instead of id it did not work

    Route::get('/profiles/{user}', 'ApiProfilesController@show');

    Route::get('/explore', 'ApiExploreController');


});

Route::get('/tweet/{user_id}','ApiTweetController@store');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
