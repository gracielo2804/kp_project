<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\ConfirmEmail;

class registerController extends Controller
{
    //
    public function register(Request $request)
    {              
        Customer::insert([
            "username_customer"=> $request->username,
            "password_customer"=> password_hash($request->pass,PASSWORD_DEFAULT),
            "nama_customer"=> $request->name,
            "pin_customer"=> password_hash($request->pin,PASSWORD_DEFAULT),
            "telp_customer"=> $request->phone,
            "email_customer"=> $request->email,
            "namabank_customer"=> $request->nama_bank,
            "norek_customer"=>$request->norek,
            "an_customer"=>$request->an_bank,
            "saldo"=> 0,
            "verif_email"=> 1
        ]);
        $to_name =  $request->input('nama');
        $to_email = $request->input('email');
        $hash = md5( rand(0,1000000000000000) );   // Generate random 32 character hash and assign it to a local variable.
                                            // Example output: f4552671f8909587cf485ea990207f3b

        ConfirmEmail::insert([
            'email'=>$request->input('email'),
            'kode_email'=>$hash
        ]);
        $data = array('nama'=>$request->nama, "body" => "Your verification code :".$hash);
        Mail::send('email', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Exim Trader Account Verification');
        $message->from('kp.project.email@gmail.com','Verifivation Code');
        });              
        $request->session()->put('verifemail',$request->email );
        $request->session()->put('usernameverif',$request->username );
        return redirect()->route('verifemail');
    }
    public function cekUsernameCustomer($username){
        $dataCustomer=Customer::where('username_customer',$username)->get();
        return $dataCustomer;
    }
    public function verifemail(Request $request){
        switch ($request['action']) {
            case 'resend':
                $nama = Customer::select('nama_customer')->where('username_customer',Session::get('usernameverif'))->first();
                $to_email = Session::get('verifemail');
                $hash = md5( rand(0,1000000000000000) );   // Generate random 32 character hash and assign it to a local variable.
                // Example output: f4552671f8909587cf485ea990207f3b
                ConfirmEmail::insert([
                    'email'=>$to_email,
                    'kode_email'=>$hash
                ]);
                $data = array('nama'=>$request->nama, "body" => "Your verification code :".$hash);
                Mail::send('email', $data, function($message) use ($nama, $to_email) {
                $message->to($to_email, $nama)
                ->subject('Exim Trader Account Verification');
                $message->from('kp.project.email@gmail.com','Verifivation Code');
                });              
                return redirect()->back();
              break;
            case 'submit':
                $data=ConfirmEmail::where('email',Session::get('verifemail'))->latest()->first();
                if($request['vercode']==$data['kode_email']){
                    $customer = Customer::where('username_customer',Session::get('usernameverif'))->update(['verif_email'=>2]);
                    Session::remove('verifemail');
                    Session::remove('usernameverif');
                    return redirect()->route('loginCustomer');
                    
                }
                else{
                    return redirect()->back()->with(['errorcode'=>'Incorrect Code']);
                }
                
              break;            
          }
    }
}
