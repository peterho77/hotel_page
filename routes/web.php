<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
});

// Route user 
Route::redirect('/', '/home');

Route::prefix('home')->group(function () {
    Route::get('/', function () {
        return view('pages.guest.home');
    })->name('home-page');
    Route::get('/rooms', function () {
        return view('pages.guest.room');
    })->name('room-page');
    Route::get('/about-us', function () {
        return view('pages.guest.about-us');
    })->name('about-us-page');
});

// Admin route chưa có auth middleware

Route::prefix('admin')->group(function () {
    Route::singleton('', AdminController::class);
    Route::apiResource('room_type', RoomTypeController::class)->except('show');
    Route::apiResource('room', RoomController::class)->except('show');
    Route::patch('/room_type/{room_type}/status', [RoomTypeController::class, 'status'])->name('room_type.status');
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
