<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\WebsiteController::class,'index'])->name('home');
Route::get('/dashboard', [\App\Http\Controllers\WebsiteController::class,'dashboard'])->name('dashboard');
Route::get('/login', [\App\Http\Controllers\WebsiteController::class,'login'])->name('login');
Route::get('/registration', [\App\Http\Controllers\WebsiteController::class,'registration'])->name('registration');
Route::get('/logout', [\App\Http\Controllers\WebsiteController::class,'logout'])->name('logout');
