<?php

namespace App\Http\Controllers;

use App\Mail\WebsiteMailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CredentialController extends Controller
{
    public function login(){

    }
    public function registration(Request $request){
         $token = hash('sha256',time());
         $user = User::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'password'=>Hash::make($request->password),
             'status'=>'oczekuje',
             'token'=>$token,
         ]);
         $verificationLink = url('registration/verify/'.$token);
         $subject = 'Potwierdzenie rejestracji w portalu';
         $body = "Cześć ".$request->name.',<br>'.'Aby potwierdzić logowanie kliknij w link poniżej: <br>'.'<a href='.$verificationLink.'>'.'Link do potwierdzenia'.'</a><br><br> Pozdrawiam, <br> DevSocha';
            Mail::to($request->email)->send(new WebsiteMailer($subject,$body));
        echo 'email send';
    }
    public function registrationVerify($token){
        $user = User::where('token',$token)->exists();
        if($user){
        User::where('token',$token)->update([
            'status' => 'aktywny',
            'token'=>'',
        ]);
        echo 'allGood';
        }else{
            return redirect()->route('login');
        }
    }
    public function forgotPassword(){

    }
    public function verifyAccount(){

    }
}
