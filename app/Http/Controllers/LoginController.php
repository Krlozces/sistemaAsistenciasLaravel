<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView(){
        return view("signin");
    }

    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ["required", "regex: /^[A-Z]+$/"],
            'email' => ["required", "email"],
            'password' => ["required", "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/"]
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        Auth::login($user);

        return redirect(route('asistencia'));
    }

    public function login(Request $request){
        $credentials = $request->validate([
            "email" => ["required","email"],
            "password" => ["required", "min:8"],
        ]);

        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }else{
            return redirect('signin')->with('error', 'Credenciales incorrectas. Por favor, inténtelo de nuevo.');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'));
    }

    public function signupUser(Request $request){
        $request->validate([
            'name' => ["required", "regex: /^[a-zA-Z]+$/"],
            'email' => ["required", "email"],
            'password' => ["required", "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/"]
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        Auth::login($user);

        return redirect(route('login'));
    }
}
