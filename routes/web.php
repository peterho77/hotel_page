<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;

Route::get('/', function () {
    return view('welcome');
});


Route::redirect('/', '/home');
Route::get('/home', function () {
    return view('pages.guest.home');
});

// Admin route chưa có auth middleware

Route::prefix('admin')->group(function () {
    Route::singleton('', AdminController::class);
    Route::apiResource('room_type', RoomTypeController::class)->except('show');
    Route::get('/room_type/show',[RoomTypeController::class,'show'])->name('room_type.show');
});



