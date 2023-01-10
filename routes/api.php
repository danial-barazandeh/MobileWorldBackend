<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('onClickRegisterOrLogin', [UserController::class,'onClickRegisterOrLogin']);
Route::get('brands', [\App\Http\Controllers\BrandController::class,'brands']);
Route::post('devices', [\App\Http\Controllers\DeviceController::class,'devices']);
Route::post('products', [\App\Http\Controllers\ProductController::class,'products']);
Route::post('search', [\App\Http\Controllers\DeviceController::class,'search']);
Route::get('sliders',  [\App\Http\Controllers\SliderController::class,'sliders']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('getUserInfo', [UserController::class,'getUserInfo']);
    Route::post('updateUser', [UserController::class,'updateUser']);
});
