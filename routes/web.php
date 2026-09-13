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

Route::get('/session', [SalonSessionController::class, 'index']);

Route::get('/session/create', [SalonSessionController::class, 'create']);

Route::post('/session', [SalonSessionController::class, 'store']);

Route::get('/session/{id}', [SalonSessionController::class, 'show']);
Route::get('/session/edit/{id}', [SalonSessionController::class, 'edit']);
Route::post('/session/update/{id}', [SalonSessionController::class, 'update']);

Route::get('/session/destroy/{id}', [SalonSessionController::class, 'destroy']);