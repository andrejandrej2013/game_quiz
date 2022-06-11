<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesControler extends Controller
{
    public function categories_list()
    {
        $categories = CategoriesModel::all();
        // return view('welcome', compact('categories'));
        return view('welcome',compact('categories'));
    }


    public function generate_level($id)
    {
        $image = 'some_file.jpg';//need to add random image pick
        return view('level',compact('image'));
    }
}
