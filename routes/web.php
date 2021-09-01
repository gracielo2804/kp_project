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
    if(Session::has('custLog')){
        return redirect()->route('homecust');
    }
    else{    
        Session::remove('verifemail');
        Session::remove('usernameverif');
        return view('loginCustomer');
    }    
})->name("loginCustomer");
Route::post('/logincust',  'loginController@login');
Route::get('/loginadmin', function () {
    return view('loginadmin');
})->name("loginAdmin");
Route::post('/loginadmin','loginController@loginadmin');
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
Route::get('/ajaxRefreshSession/{param}','customerController@refreshSession');
Route::get('/logout','loginController@logout');


//CUSTOMER
Route::middleware("authCustomer")->group(function(){
    Route::get('/homecust',function(){
        return view('index');
    })->name('homecust');
    //Deposit
    Route::get('/deposit','customerController@depositPage')->name('deposit');  
    Route::post('/deposit','customerController@deposit');  
    //HistoryDeposit
    Route::get('/hisDeposit','customerController@hisDepositPage')->name('hisDeposit');  
    Route::get('/editProfile','customerController@editProfilePage')->name('editProfile');  
    Route::post('/editProfile','customerController@editProfile');  
});
 

//Owner
Route::get('/homewner',function(){
    echo('ini halaman owner');
})->name('homeowner');
Route::get('/homeadmin',function(){
    echo('ini halaman admin');
})->name('homeadmin');

Route::get('/', function () {
    return redirect()->route('loginCustomer');
});
