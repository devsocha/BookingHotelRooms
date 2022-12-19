<?php

namespace App\Http\Controllers;

use App\Mail\WebsiteMailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CredentialController extends Controller
{
    public function loginCheck(Request $request){
        $credentilals=[
            'email' => $request->email,
            'password'=>$request->password,
            'status'=> 'aktywny',
        ];
        if(Auth::attempt($credentilals)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }

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
         //Tworzenie tokenu potwierdzającego konto po rejestracji
         $verificationLink = url('registration/verify/'.$token);
         //Przypisanie tematu maila
         $subject = 'Potwierdzenie rejestracji w portalu';
         //Przypisanie tekstu wiadomości wraz z linkiem do kliknięcia
         $body = "Cześć ".$request->name.',<br>'.'Aby potwierdzić logowanie kliknij w link poniżej: <br>'.'<a href='.$verificationLink.'>'.'Link do potwierdzenia'.'</a><br><br> Pozdrawiam, <br> DevSocha';
         // Wysłanie maila z potwierdzeniem
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
