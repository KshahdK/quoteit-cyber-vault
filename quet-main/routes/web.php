<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('welcome');
})->name('login');

Route::get('/signup', function () {
    return view('welcome');
})->name('signup');