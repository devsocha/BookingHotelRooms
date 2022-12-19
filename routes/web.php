<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\WebsiteController::class,'index'])->name('home');
Route::get('/dashboard', [\App\Http\Controllers\WebsiteController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/login', [\App\Http\Controllers\WebsiteController::class,'login'])->name('login');
Route::post('/login/check', [\App\Http\Controllers\CredentialController::class,'loginCheck'])->name('login_check');

Route::get('/registration', [\App\Http\Controllers\WebsiteController::class,'registration'])->name('registration');
Route::post('/registration/save', [\App\Http\Controllers\CredentialController::class,'registration'])->name('registration_save');
Route::get('/registration/verify/{token}/{email}', [\App\Http\Controllers\CredentialController::class,'registrationVerify'])->name('registration_verify');

Route::get('/logout', [\App\Http\Controllers\CredentialController::class,'logout'])->name('logout');

Route::get('/forget-password', [\App\Http\Controllers\WebsiteController::class,'forgetPassword'])->name('forget_password');
Route::post('/forget-password/send', [\App\Http\Controllers\CredentialController::class ,'forgetPasswordSend'])->name('forget_password_send');
Route::get('/resetPassword/link/{token}/{email}', [\App\Http\Controllers\CredentialController::class ,'forgetPasswordLink'])->name('forget_password_link');
Route::post('/reset-password', [\App\Http\Controllers\CredentialController::class ,'resetPassword'])->name('reset_password');
