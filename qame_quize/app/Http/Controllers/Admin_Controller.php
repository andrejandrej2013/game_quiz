<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_Controller extends Controller
{
    public function check_rights()
    {
        if(Auth::check())
        {
            if(auth()->user()->admin==0)
            {
                return redirect(route('welcome'))->withErrors([
                    'access'=>'You do not have rights'
                ]);
            }
        }
        else
        {
            return redirect(route('login'))->withErrors([
                'access'=>'You must be authenticated'
            ]);
        }
    }
    public function admin()
    {
        if(Auth::check())
        {
            if(auth()->user()->admin==0)
            {
                return redirect(route('welcome'))->withErrors([
                    'access'=>'You do not have rights'
                ]);
            }
        }
        else
        {
            return redirect(route('login'))->withErrors([
                'access'=>'You must be authenticated'
            ]);
        }
        return view('admin/admin');
    }
    public function add_foto()
    {
        return view('admin/add_foto_admin');
    }
    public function add_game()
    {
        return view('admin/add_game_admin');
    }
}
