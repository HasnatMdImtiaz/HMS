<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'home']);
// admin login

Route::get('admin/login', [AdminController::class,'login']);
Route::post('admin/login', [AdminController::class,'check_login']);
Route::get('admin/logout', [AdminController::class,'logout']);
// admin dashboard

Route::get('admin', [AdminController::class,'dashboard']);

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

//  Department Routes
Route::get('admin/department/{id}/delete',[StaffDepartment::class,'destroy']);
Route::resource('admin/department',StaffDepartment::class);

// Staff payment
Route::get('admin/staff/payments/{id}',[StaffController::class,'all_payments']);
Route::get('admin/staff/payment/{id}/add',[StaffController::class,'add_payment']);
Route::post('admin/staff/payment/{id}',[StaffController::class,'save_payment']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment']);
// Staff routes
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
Route::resource('admin/staff',StaffController::class);
//Booking routes

Route::get('admin/booking/{id}/delete',[BookingController::class,'destroy']);
Route::get('admin/booking/available-rooms/{checkin_date}',[BookingController::class,'available_rooms']);
Route::resource('admin/booking',BookingController::class);
// Delete images
Route::get('admin/roomtypeimage/delete/{id}',[RoomtypeController::class,'destroy_image']);
// Route::resource('admin/roomtype',RoomtypeController::class);
// Route::put('admin/roomtype/{id}', 'RoomtypeController@update')->name('roomtype.update');

// Route::resource('admin/roomtype/create',RoomtypeController::class);
?>