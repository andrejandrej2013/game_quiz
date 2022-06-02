<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/private','private')->middleware('auth')->name('private');
Route::get('/login', function () {
    if(Auth::check())
    {
        return redirect(route('private'));
    }
    return view('login');
})->name('login');
// Route::post('/login', 'App\Http\Controllers\UserController@submit')->name('reg-form');

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

Route::post('/registration', [\App\Http\Controllers\UserController::class,'save'])->name('reg-form');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/rank', function () {
    return view('rank');
})->name('rank');

//Route::post('/reg-form/submit', 'App\Http\Controllers\UserController@submit')->name('reg-form');