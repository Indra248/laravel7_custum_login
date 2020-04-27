<?php

use Illuminate\Support\Facades\Route;

Route::get('login/{id}', function ($id) {
    
});

Route::get('/', function () {
    return view('welcome');
});
