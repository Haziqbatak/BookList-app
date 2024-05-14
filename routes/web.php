<?php

use App\Http\Controllers\bookController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\placeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/category', categoryController::class);
Route::resource('/place', placeController::class);
Route::resource('/book', bookController::class);