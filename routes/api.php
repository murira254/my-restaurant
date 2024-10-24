<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentController;

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
Route::middleware('auth:sanctum')->get('/user', function(request $request) { 
    return $request ->user();
})->middleware('auth:sanctum');

Route::post('/register',[AuthController :: class,'register']);
Route::post ('/login' ,[AuthController :: class,'login']);

Route::middleware('auth:sanctum') ->group(function(){
    Route::apiResources([ 
        'categories' => CategoryController::class,
        'menus' =>MenuController::class,
        'orders' =>OrdersController::class,
        'payment' => PaymentController::class
    
    ])
    ;
});
