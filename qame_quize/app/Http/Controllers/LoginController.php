<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        if(Auth::check())
        {
            return redirect()->intended(route('private'));

        }
        $formFields = $req->only(['email','password']);//get data
        if(Auth::attempt($formFields))
        {
            return redirect()->intended(route('private'));
        }
        return redirect(route('login'))->withErrors([
            'email'=>'incorrect data'
        ]);

    }
}
