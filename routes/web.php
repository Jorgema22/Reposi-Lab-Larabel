<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/productos', [ProductoController::class, 'index'])->middleware('auth');

