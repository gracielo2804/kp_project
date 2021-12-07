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
    Route::get('/homecust','customerController@homePage')->name('homecust');
    //Deposit
    Route::get('/deposit','customerController@depositPage')->name('deposit');
    Route::post('/deposit','customerController@deposit');

    Route::get('/invest','customerController@investPage')->name('invest');
    Route::post('/invest','customerController@invest');
    Route::get('/hisInvest','customerController@hisInvestPage')->name('hisInvest');

    Route::get('/withdraw','customerController@withdrawPage')->name('withdraw');
    Route::post('/withdraw','customerController@withdraw');
    Route::get('/ajaxCekPin/{param}','customerController@cekPIN');
    //HistoryDeposit
    Route::get('/hisDeposit','customerController@hisDepositPage')->name('hisDeposit');

    Route::get('/hisWithdraw','customerController@hisWithdrawPage')->name('hisWithdraw');
    Route::get('/editProfile','customerController@editProfilePage')->name('editProfile');
    Route::post('/editProfile','customerController@editProfile');
});


//Admin

Route::get('/admin/list/aktifpaket/{id}','adminController@aktif_paket');
Route::get('/admin/list/nonaktifpaket/{id}','adminController@nonaktif_paket');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard','adminController@');
    Route::prefix('list')->group(function () {

        Route::get('/paketinvestasi','adminController@listPaket')->name('homeadmin');
        Route::get('/addpaket','adminController@pageAddPaket');
        Route::post('addpaket/new','adminController@confAddPaket');
        Route::get('editpaket/{id}','adminController@edit_paketview');
        Route::post('editpaket/submit','adminController@edit_paket');

        Route::get('/admin','adminController@listadmin');

        Route::get('/aktifadmin/{username}','adminController@aktif_admin');
        Route::get('/nonaktifadmin/{username}','adminController@nonaktif_admin');
        Route::get('/addadmin','adminController@pageAddAdmin');
        Route::post('/addadmin/new','adminController@add_admin');
        Route::get('/editadmin/{username}','adminController@edit_adminview');
        Route::post('/editadmin/new','adminController@edit_admin');

        Route::get('/customer','adminController@');
    });
    Route::prefix('pending')->group(function () {

        Route::get('/deposit','adminController@pending_depo');
        Route::get('/deposit/detail/{id}','adminController@detail_depo');
        Route::get('/deposit/accept/{id}/{username}/{jumlah}','adminController@acc_pending_depo');
        Route::post('/deposit/detail/decline','adminController@dec_pending_depo');

        Route::get('/withdrawal','adminController@pending_wd');
        Route::get('/withdrawal/detail/{id}','adminController@detail_wd');
        Route::post('/withdrawal/accept','adminController@acc_pending_wd');
        Route::post('/withdrawal/decline','adminController@dec_pending_wd');

        Route::get('/editprofile','adminController@pending_edit_profile');
        Route::get('/editprofile/detail/{user}','adminController@detail_edit_profile');
        Route::get('/request/accept/{user}/{pw}/{nama}/{telp}/{email}/{bank}/{rek}/{an}','adminController@acc_pending_edit_profile');
        Route::post('/editprofile/detail/decline','adminController@dec_pending_edit_profile');
    });
    Route::get('/laporanpembelian','adminController@history_pembelian_paket');
    Route::get('/laporanwddepo','adminController@');
    Route::get('/logadmin','adminController@logadmin');
});


Route::get('/', function () {
    return redirect()->route('loginCustomer');
});
