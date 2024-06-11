<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Lots;

class ActionsController extends Controller
{
    public function register(Request $request){
        $request -> validate([
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|min:8|alpha_dash|confirmed',
        ], [
            'user.name.required' => 'Поле "Имя" обязательно для заполнения',
            'user.email.required' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email' => 'Поле "Электронная почта" должно быть представленно в виде валидного адреса электронной почты',
            'user.email.unique' => 'Данный адрес почты уже занят...',
            'user.password.required' => 'Поле "Пароль" обязательно для заполнения',
            'user.password.min' => 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.aplha_dash' => 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
            'user.password.confirmed' => 'Поле "Пароль" и "Повторите пароль" не совпадают',
        ]);

        $user=User::create($request -> input('user'));
        Auth::login($user);
        return redirect('/lots');
    }

    public function logout(){
        Auth::logout();
        return redirect('/register');
    }

    public function login(Request $request) {
        $request -> validate([
            'user.email' => 'required|email',
            'user.password' => 'required|min:8|alpha_dash',
        ], [
            'user.email.required' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email' => 'Поле "Электронная почта" должно быть представленно в виде валидного адреса электронной почты',
            'user.email.unique' => 'Данный адрес почты уже занят...',
            'user.password.required' => 'Поле "Пароль" обязательно для заполнения',
            'user.password.min' => 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.aplha_dash' => 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
        ]);
        if(Auth::attempt($request -> input('user'))){
            return redirect('/lots');
        } else{
            return back() -> withErrors([
                'user.email' => 'Представленные почта или пароль не подходят'
            ]);
        }
    }
}
