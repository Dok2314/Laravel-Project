<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthenticateRequest;

class RegistrationController extends Controller
{
    public function registration(AuthenticateRequest $request){
        if(Auth::check()){
            return redirect(route('user.admin'));
        }
        $validateFields = $request->all();
        if(User::where('email',$validateFields['email'])->exists()){
            return redirect(route('user.login'))->withErrors([
                'email' => 'Данный пользователь уже существует!'
            ]); 
        }
        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.admin'));
        }
        return redirect(route('user.registration'))->withErrors([
            'formError' => 'Не удалось зарегистрироватся!'
        ]);
    }
}
