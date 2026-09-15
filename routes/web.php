<?php

use App\Http\Controllers\LoginController;
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

Route::get('/session/create', [SalonSessionController::class, 'create'])->middleware('auth');

Route::post('/session', [SalonSessionController::class, 'store']);

Route::get('/session/{id}', [SalonSessionController::class, 'show']);

Route::get('/session/edit/{id}', [SalonSessionController::class, 'edit'])->middleware('auth');

Route::post('/session/update/{id}', [SalonSessionController::class, 'update'])->middleware('auth');

Route::get('/session/destroy/{id}', [SalonSessionController::class, 'destroy'])->middleware('auth');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});