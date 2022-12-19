<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\WebsiteController::class,'index'])->name('home');
Route::get('/dashboard', [\App\Http\Controllers\WebsiteController::class,'dashboard'])->name('dashboard');
Route::get('/login', [\App\Http\Controllers\WebsiteController::class,'login'])->name('login');
Route::get('/registration', [\App\Http\Controllers\WebsiteController::class,'registration'])->name('registration');
Route::post('/registration/save', [\App\Http\Controllers\CredentialController::class,'registration'])->name('registration_save');
Route::get('/registration/verify/{token}', [\App\Http\Controllers\CredentialController::class,'registrationVerify'])->name('registration_verify');
Route::get('/logout', [\App\Http\Controllers\WebsiteController::class,'logout'])->name('logout');
Route::get('/forget-password', [\App\Http\Controllers\WebsiteController::class,'forgetPassword'])->name('forget_password');
