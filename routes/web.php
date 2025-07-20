<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/','/home');
Route::get('/home', function(){
    return view('layouts.base');
});
