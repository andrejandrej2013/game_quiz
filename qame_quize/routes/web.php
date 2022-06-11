<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//check for an authenticated user
Route::view('/private','private')->middleware('auth')->name('private');


//login
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


//reg
Route::get('/registration', function () {
    if(Auth::check())
    {
        return redirect(route('private'));
    }
    return view('registration');
})->name('registration');
Route::post('/registration', [\App\Http\Controllers\UserController::class,'save']);
Route::get('/', [\App\Http\Controllers\CategoriesControler::class,'categories_list'])->name('welcome');


//rank
Route::get('/rank', [\App\Http\Controllers\UserController::class,'users_rank'])->name('rank');
//level
Route::get('/level/{id}', [\App\Http\Controllers\CategoriesControler::class,'generate_level'])->name('level');


//admin pages
Route::get('/admin', [\App\Http\Controllers\Admin_Controller::class,'admin'])->name('admin');
Route::get('/admin_add_foto', [\App\Http\Controllers\Admin_Controller::class,'add_foto'])->name('add_foto');
Route::get('/admin_add_game', [\App\Http\Controllers\Admin_Controller::class,'add_game'])->name('add_game');


