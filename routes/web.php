<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\WebsiteController::class,'index'])->name('home');
