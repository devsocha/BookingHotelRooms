<?php

namespace App\Http\Controllers;

use App\Mail\WebsiteMailer;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function dashboardAdmin(){
        return view('admin.dashboard');
    }
    public function settings(){
        return view('admin.settings');
    }
    public function loginCheck(Request $request){
        $credentilals=[
            'email' => $request->email,
            'password'=>$request->password,
        ];
        if(Auth::guard('admin')->attempt($credentilals)){
            return redirect()->route('dashboard_admin');
        }else{
            return redirect()->route('admin_login');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
