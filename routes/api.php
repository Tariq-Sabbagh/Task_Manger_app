<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskControllerR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::post('/tasks',[TaskController::class,'store']);
// Route::get('/tasks',[TaskController::class,'index']);
// Route::get('/tasks/{id}',[TaskController::class,'showOneTask']);
// Route::put('/tasks/{id}',[TaskController::class,'update']);
// Route::delete('/tasks/{id}',[TaskController::class,'destroy']);

Route::apiResource('/tasks',TaskControllerR::class);
Route::post('signin',[LoginController::class,'signin']);
Route::post('signup',[registerController::class,'singup']);
