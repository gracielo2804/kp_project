<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class registerController extends Controller
{
    //
    public function register(Request $request)
    {              
        $to_name =  $request->input('nama');
        $to_email = $request->input('email');
        $hash = md5( rand(0,1000000000000000) );   // Generate random 32 character hash and assign it to a local variable.
                                            // Example output: f4552671f8909587cf485ea990207f3b
        $data = array('nama'=>$request->nama, "body" => "Your verification code :".$hash);
        Mail::send('email', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Exim Trader Account Verification');
        $message->from('kp.project.email@gmail.com','Verifivation Code');
        });       
        return redirect()->back();
    }
}
