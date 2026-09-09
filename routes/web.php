<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalonSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Казанцев Александр',
        'group' => '609-42'
    ]);
});

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/session/{id}', [SalonSessionController::class, 'show']);