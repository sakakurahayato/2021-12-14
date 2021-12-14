<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/',[ToDoController::class,'index']);

Route::group(['prefix'=>'/todo'],function(){
Route::post('/create',[TodoController::class,'create']);
Route::post('/update',[TodoController::class,'update']);
Route::post('/delete',[TodoController::class,'delete']);
});