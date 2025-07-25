<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/','/home');
Route::get('/home', function(){
    return view('pages.home');
});

// Admin route
Route::get('/admin',function(){
    return view('layouts.admin');
});
