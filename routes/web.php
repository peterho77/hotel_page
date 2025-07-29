<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/','/home');
Route::get('/home', function(){
    return view('pages.guest.home');
});

// Admin route

Route::get('/admin/room',function(){
    return view('pages.admin.room.room');
});
