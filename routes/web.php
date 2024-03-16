<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/departamentos', function () {
    return view('departamentos');
});

Route::get('/estados', function () {
    return view('estados');
});
