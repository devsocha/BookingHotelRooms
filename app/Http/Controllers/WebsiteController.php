<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('home');
    }
    public function dashboardUser(){
        return view('dashboard');
    }
    public function dashboardAdmin(){
        return view('dashboard_admin');
    }
    public function login(){
        return view('login');
    }
    public function registration(){
        return view('registration');
    }
    public function forgetPassword(){
        return view('forget_password');
    }
    public function settings(){
        return view('settings');
    }
}
