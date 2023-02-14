<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Api
// Route::group(['prefix'=>'api','namespace'=>'Api','middleware' => 'auth:sanctum'],function(){
//     Route::get('/roles','RoleController@roleindex');
//     Route::get('/permissions','RoleController@permission');
//     Route::post('/roles/store','RoleController@rolestore');
//     Route::get('/roles/{id}/edit','RoleController@roleedit');
//     Route::post('/roles/{id}/update','RoleController@roleupdate');
//     Route::delete('/roles/{id}/destroy','RoleController@roledestroy');
//     Route::get('/users/{id}/detail','UserController@userdetail');
//     Route::get('/userslist','UserController@userindex');
//     Route::get('/users/create','UserController@usercreate');
//     Route::post('/users/store','UserController@userstore');
//     Route::get('/users/{id}/edit','UserController@useredit');
//     Route::post('/users/{id}/update','UserController@userupdate');
// });

// Route::group(['prefix'=>'api','middleware' => 'auth:sanctum'],function(){
//     Route::get('/user','AuthController@show');
//     Route::get('/logout','AuthController@logout');
// });


// Route::group(['namespace'=>'Usermanagement'],function(){
//     Route::resource('employees','EmployeeController');
//     Route::resource('roles','RoleController');
// });

