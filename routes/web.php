<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\LanguageController;

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
    Route::get('/room_type/show', [RoomTypeController::class, 'show'])->name('room_type.show');
    Route::patch('/room_type/update_status/{room_type}', [RoomTypeController::class, 'update_status'])->name('room_type.update_status');
});

// Lang switch
Route::middleware(['web'])->group(function () {
    Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');
});

// 
Route::get('/reset-session', function () {
    session()->flush(); // XÓA toàn bộ session
    return redirect('/');
});