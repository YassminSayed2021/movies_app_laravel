<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
 
//create movie
Route::post('cr_mov',[MovieController::class,'createMovie']);
//view movies
Route::get('cr_mov',[MovieController::class,'viewMovie']);
//delete movies
Route::delete('cr_mov/{id}/delete',[MovieController::class,'deleteMovie']);
//update movie
Route::get('cr_mov/{id}/edit',[MovieController::class,'edit']);
Route::put('cr_mov/{id}/edit',[MovieController::class,'update']);

//view Categories
Route::get('cat',[CategoryController::class,'viewCategory']);
//create category
Route::post('cat',[CategoryController::class,'createCategory']);
//update category
Route::get('cat/{id}/edit',[CategoryController::class,'edit']);
Route::put('cat/{id}/edit',[CategoryController::class,'update']);
//delete category
Route::delete('cat/{id}/delete',[CategoryController::class,'deleteCat']);

//view users
Route::get('users',[UserController::class,'viewUser']);
//create user
Route::post('users',[UserController::class,'createUser']);


