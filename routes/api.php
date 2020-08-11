<?php

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

// Route::middleware('auth:api')->group(function () {
// });

// Route::post('/register', 'AuthController@register');

// Route::post('login', [AccessTokenController::class, 'issueToken'])
//     ->middleware(['jwt.verify']);

Route::group(['middleware' => ['auth.jwt']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Route::get('user', 'UserController@getAuthenticatedUser');
    Route::delete('/todo/{doTheDo}', 'DoTheDoController@destroy');
    Route::patch('/todo/{doTheDo}', 'DoTheDoController@update');
    Route::post('/todo', 'DoTheDoController@store');
    Route::get('/todos', 'DoTheDoController@index');
});

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
