<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('products',[ProductController::class,'index']);
// Route::post('products',[ProductController::class,'store']);
// Route::get('products/{product}',[ProductController::class,'show']);
// Route::put('products/{product}',[ProductController::class,'update']);
// Route::delete('products/{product}',[ProductController::class,'destroy']);

Route::apiResource('products',ProductController::class);

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::post('register',[AuthController::class,'register']);
    Route::get('me',[AuthController::class,'me']);
});
