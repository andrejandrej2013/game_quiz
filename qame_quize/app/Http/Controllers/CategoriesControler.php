<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Join_Categories_Models;
use Illuminate\Support\Facades\DB;


class CategoriesControler extends Controller
{
    public function categories_list()
    {
        $categories = CategoriesModel::all();
        // return view('welcome', compact('categories'));
        return view('welcome',compact('categories'));
    }


    public function generate_level($category_id)
    {
        // $game_id=DB::table('join_categories')
        // ->join('contacts', 'users.id', '=', 'contacts.user_id')
        // ->select('join_categories.game_id')
        // ->where('category_id',$category_id)
        // ->inRandomOrder();

        // $foto = DB::table('foto')
        // ->join('join_categories', function ($join) {
        //     $join->on('foto.game_id', '=', 'join_categories.game_id')
        //          ->where('join_categories.category_id','=', 1);
        // })
        // ->select('foto.foto');
        $images = DB::table('foto')
        ->join('join_categories','foto.game_id', '=', 'join_categories.game_id')
        ->where('join_categories.category_id','=', $category_id)
        ->select('foto.foto')
        ->inRandomOrder();
        if($images->exists())
        {
            $images=$images->limit(5)->get();
            return view('level',compact('images'));
        }
        else
        {
            return redirect(route('welcome'))->withErrors([
                'FotoDontExists' => 'Sorry, there are no images for this category. Please, pick another one!'
            ]);
            $images = 'some_file.jpg';//need to add random image pick

        }
    }
}
