<?php

use App\Http\Controllers\api\RoleController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    // userid 
    Route::get('/user',[AuthController::class,'show']);
    Route::post('/logout',[AuthController::class,'logout']);

    // role manage
    Route::get('/roles',[RoleController::class,'roleindex']);
    Route::get('/permissions',[RoleController::class,'permission']);
    Route::post('/roles/store',[RoleController::class,'rolestore']);
    Route::get('/roles/{id}/edit',[RoleController::class,'roleedit']);
    Route::post('/roles/{id}/update',[RoleController::class,'roleupdate']);
    Route::delete('/roles/{id}/destroy',[RoleController::class,'roledestroy']);

    //user manage
    Route::get('/users',[UserController::class,'userindex']);
    Route::get('/users/create',[UserController::class,'usercreate']);
    Route::post('/users/store',[UserController::class,'userstore']);
    Route::get('/users/{id}/edit',[UserController::class,'useredit']);
    Route::post('/users/{id}/update',[UserController::class,'userupdate']);
    Route::get('/users/{id}/detail',[UserController::class,'userdetail']);
    Route::delete('/users/{id}/destroy',[UserController::class,'userdestroy']);
});


