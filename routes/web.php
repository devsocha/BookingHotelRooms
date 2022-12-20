<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\WebsiteController::class,'index'])->name('home');
Route::get('/dashboard/user', [\App\Http\Controllers\WebsiteController::class,'dashboardUser'])->name('dashboard_user')->middleware('auth',);


Route::get('/settings', [\App\Http\Controllers\WebsiteController::class,'settings'])->name('settings')->middleware('auth');

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
/* Admin */
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class,'login'])->name('admin_login');
Route::post('/admin/login/check', [\App\Http\Controllers\AdminController::class,'loginCheck'])->name('admin_login_check');
Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class,'dashboardAdmin'])->name('dashboard_admin')->middleware('admin:admin');
Route::get('/admin/settings', [\App\Http\Controllers\AdminController::class,'settings'])->name('settings_admin')->middleware('admin:admin');
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class,'logout'])->name('logout_admin');
