<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//check for an authenticated user
Route::view('/private','private')->middleware('auth')->name('private');


Route::get('/login', function () {
    if(Auth::check())
    {
        return redirect(route('private'));
    }
    return view('login');
})->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'login']);


Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/registration', function () {
    if(Auth::check())
    {
        return redirect(route('private'));
    }
    return view('registration');
})->name('registration');

Route::post('/registration', [\App\Http\Controllers\UserController::class,'save']);


// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', [\App\Http\Controllers\CategoriesControler::class,'categories_list'])->name('welcome');



// Route::get('/rank', function () {
//     return view('rank');
// })->name('rank');

Route::get('/rank', [\App\Http\Controllers\UserController::class,'users_rank'])->name('rank');

// Route::get('/level/{id}', function ($id) {
//     // return $id;
//     return view('level',['id'=>$id]);
// })->name('level');

Route::get('/level/{id}', [\App\Http\Controllers\CategoriesControler::class,'generate_level'])->name('level');
