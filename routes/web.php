<?php

use Illuminate\Support\Facades\Route;

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


//Login dan Register
Route::get('/login', function () {
    return view('login');
})->name("login");
// Route::post('/log', 'mctrl@log');
Route::post('/login', 'registerController@login');
Route::post('/register','registerController@register');

Route::get('/register',function(){
    return view('register');
})->name('register');

Route::get('/', function () {
    return view('welcome');
});
