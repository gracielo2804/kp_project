<?php

use Illuminate\Support\Facades\Session;
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


//Login,Loguout, dan Register
Route::get('/logincust', function () {
    Session::remove('verifemail');
    Session::remove('usernameverif');
    return view('loginCustomer');
})->name("loginCustomer");
Route::post('/logincust',  'loginController@login');

Route::get('/loginadm', function () {
    return view('loginAdmin');
})->name("loginAdmin");
// Route::post('/login', 'registerController@login');
Route::post('/register','registerController@register');

Route::get('/register',function(){
    return view('register');
})->name('register');

Route::get('/verifemail', function () {
    if(Session::has('verifemail')){
        return view('verifemail');
    }
    else{
        return redirect()->back();
    }
    
})->name('verifemail');

Route::post('/verifemail','registerController@verifemail');
Route::get('/ajaxUsernameCustomer/{param}','registerController@cekUsernameCustomer');
Route::get('/logout','loginController@logout');


//CUSTOMER
Route::get('/homecust',function(){
    if(Session::has('custLog')){
        return view('index');;
    }
    else{
        return redirect()->back();
    }
    
})->name('homecust');



Route::get('/', function () {
    return redirect()->route('loginCustomer');
});
