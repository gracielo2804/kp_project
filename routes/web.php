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
Route::get('/logincust', function () {
    return view('loginCustomer');
})->name("loginCustomer");
Route::get('/loginadm', function () {
    return view('loginAdmin');
})->name("loginAdmin");
// Route::post('/log', 'mctrl@log');
Route::post('/login', 'registerController@login');
Route::post('/register','registerController@register');

Route::get('/register',function(){
    return view('register');
})->name('register');

Route::get('/', function () {
    return redirect()->route('loginCustomer');
});
