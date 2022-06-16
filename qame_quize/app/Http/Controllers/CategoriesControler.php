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
        $images = DB::table('foto')
        ->join('join_categories','foto.game_id', '=', 'join_categories.game_id')
        ->join('game','foto.game_id', '=', 'game.id')
        ->where('join_categories.category_id','=', $category_id)
        ->select('foto.foto','game.name')
        ->inRandomOrder();
        if($images->exists())
        {
            $images=$images->limit(5)->get();
            $foto=array();
            foreach($images as $image)
            {
                $foto[]=['game_name'=>$image->name,'image_path'=>$image->foto,'help'=>array(3,2)];
            }
            session()->put('level',$foto);
            // dd(session()->get('level'));
            return view('level',compact('category_id'));
        }
        else
        {
            return redirect(route('welcome'))->withErrors([
                'FotoDontExists' => 'Sorry, there are no images for this category. Please, pick another one!'
            ]);

        }
    }
    public function check_answer(Request $req)
    {
        /* session keep
        game=>
        [
            0=>
            [
                game_name=>...
                image_path=>...
                help=>...(places of letters which were given)
            ]
            1=>
            [
                -//-
            ]
            ...
        ]
        */
        $rigth_answer=15;
        $user_get = 0;
        unset($req['_token']);
        $level =session()->get('level');
        foreach ($req->all() as $key => $answer) {
            // dd($answer);
            if(strtolower($level[$key]['game_name'])==strtolower($answer))
            {
                $user_get += $rigth_answer-5*(count($level[$key]['help']));//need to check --no more than 3 helps
            }
            else
            {
                echo "Right answer of ".$key." image is : ".$level[$key]['game_name'];
            }

        }

        session()->flush();
        return dd($req->all());
    }
}
