<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin(){
        return redirect()->route('login');
    }

    public function login(Request $request){
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back();
    }

    public function showFormRegister(){
        return redirect()->route('Signup');
    }
    public function register(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|name|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->name,
        'password' => $request->password
        //'password' => Hash::make($request->password),
    ]);

    auth()->login($user);

    return redirect()->route('login');
}

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
