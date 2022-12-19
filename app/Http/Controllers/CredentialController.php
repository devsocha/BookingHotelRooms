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
            $userCheck = User::where('email',$request->email)->exists();
            if(!$userCheck){
                $token = hash('sha256',time());
                $user = User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'status'=>'oczekuje',
                    'token'=>$token,
                ]);
                //Tworzenie tokenu potwierdzającego konto po rejestracji
                $verificationLink = url('registration/verify/'.$token.'/'.$request->email);
                //Przypisanie tematu maila
                $subject = 'Potwierdzenie rejestracji w portalu';
                //Przypisanie tekstu wiadomości wraz z linkiem do kliknięcia
                $body = "Cześć ".$request->name.',<br>'.'Aby potwierdzić logowanie kliknij w link poniżej: <br>'.'<a href='.$verificationLink.'>'.'Link do potwierdzenia'.'</a><br><br> Pozdrawiam, <br> DevSocha';
                // Wysłanie maila z potwierdzeniem
                Mail::to($request->email)->send(new WebsiteMailer($subject,$body));
                return redirect()->route('login');
            }else{
                return redirect()->route('registration');
            }

    }
    public function registrationVerify($token,$email){
        $user = User::where('token',$token)->where('email',$email)->exists();
        if($user){
        User::where('token',$token)->update([
            'status' => 'aktywny',
            'token'=>'',
        ]);
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }
    }
    public function forgetPasswordSend(Request $request){
        $checkUser = User::where('email',$request->email)->exists();
        if($checkUser){
            $token = hash('sha256',time());
            $updateToken = User::where('email',$request->email)->update([
                'token'=> $token,
            ]);
            $resetPasswordLink = url('resetPassword/link/'.$token.'/'.$request->email);
            //Przypisanie tematu maila
            $subject = 'Zapomniane hasło? Pomagamy!';
            //Przypisanie tekstu wiadomości wraz z linkiem do kliknięcia
            $body = 'Cześć, <br>'.'Aby zrestartować hasło: <br>'.'<a href='.$resetPasswordLink.'>'.'Link do zmiany hasła'.'</a><br><br> Pozdrawiam, <br> DevSocha';
            // Wysłanie maila z potwierdzeniem
            Mail::to($request->email)->send(new WebsiteMailer($subject,$body));
            return redirect()->route('login');
        }else{
            return redirect()->route('forget_password');
        }
    }
    public function forgetPasswordLink($token,$email){
        $checkUser = User::where('email',$email)->where('token',$token)->exists();
        if(!$checkUser){
            return redirect()->route('login');
        }else{
            return view('reset_password',compact('token','email'));
        }
    }
    public function resetPassword(Request $request){
        $checkUser = User::where('email',$request->email)->where('token',$request->token)->exists();
        if($checkUser) {
            User::where('token', $request->token)->update([
                'password' => Hash::make($request->password),
                'token' => '',
            ]);
        return redirect()->route('login');
        }
        else{
            return redirect()->route('forget_password');
        }
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
