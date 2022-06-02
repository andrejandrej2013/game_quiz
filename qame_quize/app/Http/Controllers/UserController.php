<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegValidationRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function save(Request $req)
    {
        $validateFields = $req->validate([
                'fname' => 'required|min:3|max:50',
                'lname' => 'required|min:3|max:50',
                'login' => 'required|min:8|max:50',
                'password' => 'required|min:8|max:50',
                'email' => 'required|email:rfc,dns',
                'date' => 'required|before:today'
            ]
        );
        if(Auth::check())
        {
            return redirect(route('private'));
        }
        $user = User::create($validateFields);
        if($user)
        {
            Auth::login($user);//Auth::
            return redirect(route('private'));
        }
        return redirect(route('login'))->withErrors([
            'formError'=>'An error occurred while saving the user'
        ]);

    }
    
}
