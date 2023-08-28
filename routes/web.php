<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;


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

Route::get('/', function () {
    return view('welcome');
});
// admin login

Route::get('admin/login', [AdminController::class,'login']);
Route::post('admin/login', [AdminController::class,'check_login']);
Route::get('admin/logout', [AdminController::class,'logout']);
// admin dashboard

Route::get('admin', function () {
    return view('dashboard');
});


Route::get('layout', function () {
    return view('layout');
});

// Roomtype routes
Route::get('admin/roomtype/{id}/delete',[RoomtypeController::class,'destroy']);
Route::resource('admin/roomtype',RoomtypeController::class);


// Rooms routes

Route::get('admin/rooms/{id}/delete',[RoomController::class,'destroy']);
Route::resource('admin/rooms',RoomController::class);

// Customer routes
Route::get('admin/customer/{id}/delete',[CustomerController::class,'destroy']);
Route::resource('admin/customer',CustomerController::class);

// Delete images
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);
// Route::resource('admin/roomtype',RoomtypeController::class);
// Route::put('admin/roomtype/{id}', 'RoomtypeController@update')->name('roomtype.update');

// Route::resource('admin/roomtype/create',RoomtypeController::class);
?>