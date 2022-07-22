<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserContactController

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::post('/contact', 'Api\UserContactController@store');

// Product Controller
Route::prefix('/product')->group(function() {
    Route::get('/', 'Api\ProductController@index');
    Route::get('/favorite', 'Api\ProductController@favoriteShow');
    Route::get('/{id}', 'Api\ProductController@show');
    Route::get('/category/{id}', 'Api\ProductController@showWithCategory');
});