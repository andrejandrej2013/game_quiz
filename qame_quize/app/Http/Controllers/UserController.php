<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function save(Request $req)
    {
        if(Auth::check())
        {
            return redirect(route('private'));
        }
        
        $validateFields = $req->validate([
                'fname' => 'required|min:3|max:50',
                'lname' => 'required|min:3|max:50',
                'login' => 'required|min:8|max:50',
                'password' => 'required|min:8|max:50',
                'email' => 'required|email:rfc,dns',
                'date' => 'required|before:today'
            ]
        );
        //check for unique email
        if(User::where('email',$validateFields['email'])->exists())
        {
            return redirect(route('registration'))->withErrors([
                'email' => 'This email already exists in the system'
            ]);
        }

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
    public function users_rank()
    {
        $users = User::all();
        return view('rank', compact('users'));
    }

    
}
