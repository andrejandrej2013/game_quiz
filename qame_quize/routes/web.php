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
Route::post('/level/{id}', [\App\Http\Controllers\CategoriesControler::class,'check_answer']);


//admin pages
Route::get('/admin', [\App\Http\Controllers\Admin_Controller::class,'admin_page'])->name('admin_page');
Route::get('/admin_foto', [\App\Http\Controllers\Admin_Controller::class,'foto_page'])->name('foto_page');
Route::get('/admin_game', [\App\Http\Controllers\Admin_Controller::class,'game_page'])->name('game_page');
Route::get('/admin_category', [\App\Http\Controllers\Admin_Controller::class,'category_page'])->name('category_page');
Route::get('/admin_join', [\App\Http\Controllers\Admin_Controller::class,'join_page'])->name('join_page');


Route::post('/admin_add_category', [\App\Http\Controllers\Admin_Controller::class,'add_category'])->name('add_category');
Route::post('/admin_add_game', [\App\Http\Controllers\Admin_Controller::class,'add_game'])->name('add_game');
Route::post('/admin_add_foto', [\App\Http\Controllers\Admin_Controller::class,'add_foto'])->name('add_foto');
Route::post('/admin_add_join', [\App\Http\Controllers\Admin_Controller::class,'add_join'])->name('add_join');


