<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;

class customerController extends Controller
{
    //
    public function refreshSession($username){
        $customer = Customer::where('username_customer',$username)->first();
        Session::put('custLog',$customer);
    }
}
