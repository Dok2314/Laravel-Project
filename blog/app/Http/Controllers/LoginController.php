<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests\AuthenticateRequest;

class LoginController extends Controller
{
    public function login(AuthenticateRequest $request){
        if(Auth::check()){
            return redirect()->intended(route('user.admin'));
        }
        $formFields = $request->only(['name','email','password']);
        session(['alert' => 'Добро пожаловать '.$formFields['name']]);
        if(Auth::attempt($formFields)){
            return redirect()->intended(route('user.admin'));
        }
        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось войти!'
        ]);
    }
}
