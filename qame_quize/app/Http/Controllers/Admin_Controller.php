<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoriesModel;
use App\Models\Game_Model;
use App\Models\Foto_Model;
use App\Models\Join_Categories_Models;



class Admin_Controller extends Controller
{
    public function check_right()
    {
        if(Auth::check())
        {
            if(auth()->user()->admin==0)
            {
                return ['access'=>'You do not have rights'];
            }
        }
        else
        {
            return ['access'=>'You must be authenticated'];
        }
    }
    public function admin_page()
    {
        $err=$this->check_right();
        if(!empty($err))
            return redirect(route('welcome'))->withErrors($err);
        return view('admin/admin');
    }
    public function foto_page()
    {
        $err=$this->check_right();
        if(!empty($err))
            return redirect(route('welcome'))->withErrors($err);

        $games = Game_Model::all(['id','name'])->sortBy("name");
        return view('admin/add_foto_admin', compact('games'));
    }
    public function game_page()
    {
        $err=$this->check_right();
        if(!empty($err))
            return redirect(route('welcome'))->withErrors($err);
        return view('admin/add_game_admin');
    }
    public function join_page()
    {
        $err=$this->check_right();
        if(!empty($err))
            return redirect(route('welcome'))->withErrors($err);
        
        $games = Game_Model::all(['id','name'])->sortBy("name");
        $categories = CategoriesModel::all(['id','category'])->sortBy("category");
        return view('admin/add_join_admin', compact('games','categories'));
    }

    public function category_page()
    {
        $err=$this->check_right();
        if(!empty($err))
            return redirect(route('welcome'))->withErrors($err);
        return view('admin/add_category_admin');
    }
    public function add_category(Request $req)
    {
        $validateFields = $req->validate
        ([
            'category' => 'required|min:2|max:50',
        ]);
        if(CategoriesModel::where('category',$validateFields['category'])->exists())
        {
            return redirect(route('add_category_page'))->withErrors([
                'categoryExist' => 'This category already exists in the system'
            ]);
        }

        $err=$this->check_right();
        if(!empty($err))
        {
            return redirect(route('welcome'))->withErrors($err);
        }
        
        $validateFields['category'] = ucwords($validateFields['category']);
        $categories = CategoriesModel::create($validateFields);
        if($categories)
        {
            return redirect(route('admin_page'));
        }
        return redirect(route('login'))->withErrors([
            'formError'=>'An error occurred while saving the category'
        ]);

    }
    public function add_game(Request $req)
    {
        $validateFields = $req->validate
        ([
            'name' => 'required|min:2|max:50',
            'description' => 'max:250'
        ]);
        if(Game_Model::where('name',$validateFields['name'])->exists())
        {
            return redirect(route('add_game_page'))->withErrors([
                'gameExist' => 'This game already exists in the system'
            ]);
        }

        $err=$this->check_right();
        if(!empty($err))
            return redirect(route('welcome'))->withErrors($err);
        $validateFields['name'] = ucwords($validateFields['name']);
        $categories = Game_Model::create($validateFields);
        if($categories)
        {
            return redirect(route('admin_page'));
        }
        return redirect(route('login'))->withErrors([
            'formError'=>'An error occurred while saving the game'
        ]);
    }
    public function add_foto(Request $req)
    {
        $err=$this->check_right();
        if(!empty($err))
        {
            return redirect(route('welcome'))->withErrors($err);
        }
        $validateFields = $req->validate
        ([
            'game_id' => 'required|integer',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);
        $path = $req->file('image')->store('image','public');
        Foto_Model::create([
            'foto' => $path,
            'game_id' => $validateFields['game_id']
        ]);
        return redirect(route('admin_page'));
    }
    public function add_join(Request $req)
    {
        $err=$this->check_right();
        if(!empty($err))
        {
            return redirect(route('welcome'))->withErrors($err);
        }
        $validateFields = $req->all();
        //return dd($req);
        foreach($validateFields['categories_id'] as $category_id)
        {
            if(Join_Categories_Models::where('game_id',$validateFields['game_id'])->where('category_id',$category_id)->doesntExist())
            {
                Join_Categories_Models::create([
                    'game_id' => $validateFields['game_id'],
                    'category_id' =>$category_id
                ]);
            }
        }
        return redirect(route('admin_page'));

    }
    

}
