<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiExploreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::post('/register','Api\AuthController@register');

Route::post('/login', [AuthController::class, 'login']);


Route::group (['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout','Api\AuthController@logout');
    Route::get('/tweets', 'Api\TweetController@index');
    Route::post('/tweets', 'Api\TweetController@store');

    Route::post('/tweets/{tweet}/like', 'Api\TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like', 'Api\TweetLikesController@destroy');

    Route::post(
        '/profiles/{user}/follow',
        'Api\FollowsController@store'
    ); //when i did it using the username instead of id it did not work

    Route::get('/profiles/{user}', 'Api\ProfilesController@show');

    Route::get('/explore', ApiExploreController::class);


});

Route::get('/tweet/{user_id}','TweetController@store');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
