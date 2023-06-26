<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function homepage(){
        if(auth()->check()){
            return view('homepage-feed');
        } else{
            return view('homepage');
        }
    }
    function register(Request $request){
        $incomingFields = $request->validate([
            'username' => ['required', 'min:4', 'max:10', Rule::unique('users','username')],
            'email' => ['required', Rule::unique('users','email')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        User::create($incomingFields);
        return "hello from register page";
    }

    function loggedIn(Request $request){
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt([
            'username' => $incomingFields['loginusername'],
            'password' => $incomingFields['loginpassword']
        ])){
            $request->session()->regenerate();
            return "Success!!!";
        } else{
            return "Sorry!!!";
        }
    }
}
