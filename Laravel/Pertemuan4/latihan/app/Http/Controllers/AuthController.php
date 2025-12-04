<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
}


// class AuthController extends Controller
// {
//     public function showRegister()
//     {
//         return view('auth.register');
//     }

//     public function register(Request $request)
//     {

//         $validate = $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users|max:255',
//             'password' => 'required|string|min:8|confirmed'
//         ]);
//         $user = User::create($validate);

//         Auth::login($user);

//         return redirect()->route('admin.dashboard');
//     }

//     public function login(Request $request)
//     {

//         $validate = $request->validate([
//             'email' => 'required|email',
//             'password' => 'required|string'
//         ]);

//         if (Auth::attempt($validate)) {
//             $request->session()->regenerate();

//             return redirect()->route('home');
//         }

//         throw ValidationException::withMessages([
//             'message' => 'email or password is wrong'
//         ]);
//     }

//     public function showLogin()
//     {
//         return view('auth.login');
//     }

//     public function logout(Request $request)
//     {
//         Auth::logout();

//         $request->session()->regenerate();
//         $request->session()->regenerateToken();

//         return redirect()->route('show.register');
//     }
// }