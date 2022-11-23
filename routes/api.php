<?php

use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\CategoyController;
use App\Http\Controllers\Api\V1\CleaningController;
use App\Http\Controllers\Api\V1\ClerkController;
use App\Http\Controllers\Api\V1\DebtsController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\JopController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\password\ForgotPasswordController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\RateController;
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


Route::group(['prefix' => 'v1' ,'middleware' => 'lang'], function () {



    //JOP
     Route::get('/jop/index',[JopController::class,'index']);
    //END JOP

    //clerk

    Route::post('/clerk/storeclerk',[ClerkController::class,'storeclerk']);
    Route::post('/clerk/verify',[ClerkController::class,'verify']);
    Route::post('/clerk/updateclerk/{id}',[ClerkController::class,'details']);
    Route::post('/clerk/file/{id}',[ClerkController::class,'file']);
    Route::post('/clerk/file/delete/{id}',[ClerkController::class,'deletefile']);
    //end clerk










    Route::get('/home',[HomeController::class,'index']);

    Route::put('/home/update',[HomeController::class,'store'])->middleware('auth:sanctum');



    //protected routes



});
