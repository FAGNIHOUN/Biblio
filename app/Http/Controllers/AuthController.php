<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Loginrequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        /* User::create([
            'name' => 'Fid',
            'email' => 'fagnihoun205@gmail.com',
            'password' => Hash::make('00000000'),
        ]); */

        return view('auth.login');
    }
    
    public function dologin(Loginrequest $request){
        $data = $request->validated();
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.book.index'));
        }

        return back()->withErrors(['email' => 'Identifiants incorrectes'])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes déconnecté');

    }
}
