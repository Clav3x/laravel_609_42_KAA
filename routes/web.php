<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Казанцев Александр',
        'group' => '609-42'
    ]);
});
