<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\ConfirmEmail;
use PDO;

class loginController extends Controller
{
    //
    function login(Request $request){
        $username=$request['username'];
        $pass=$request['pass'];        
        $customer = Customer::where('username_customer',$username)->first();
        if($customer==null){
            return redirect()->back()->with(['error'=>'Incorrect Username or Password ']);
        }
        else{
            if(!password_verify($pass,$customer['password_customer'])){
                return redirect()->back()->with(['error'=>'Incorrect Username or Password ']);
            }
            else{
                if($customer['verif_email']==1){
                    // kalo customer blm verif, maka diarahkan ke halaman verifikasi
                    $nama = $customer['nama_customer'];
                    $to_email = $customer['email_customer'];
                    $hash = md5( rand(0,1000000000000000) );   // Generate random 32 character hash and assign it to a local variable.
                    // Example output: f4552671f8909587cf485ea990207f3b
                    ConfirmEmail::insert([
                        'email'=>$to_email,
                        'kode_email'=>$hash
                    ]);
                    $data = array('nama'=>$nama, "body" => "Your verification code :".$hash);
                    Mail::send('email', $data, function($message) use ($nama, $to_email) {
                        $message->to($to_email, $nama)
                        ->subject('Exim Trader Account Verification');
                        $message->from('kp.project.email@gmail.com','Verifivation Code');  
                    });                  
                    $request->session()->put('verifemail',$customer['email_customer'] );
                    $request->session()->put('usernameverif',$customer['username_customer'] );
                    return redirect()->route('verifemail');
                }
                else{
                    $request->session()->put('custLog',$customer);
                    return redirect()->route('homecust');
                    //Kalo Customer udh verif
                }
            }
        }        
    }
    function loginadmin(Request $request){
        $username=$request['username'];
        $pass=$request['pass']; 
        if($username=="owner_exim"&& $pass=="exim123"){
            return redirect()->route('homeowner');
        }
        else{
            $admin = Admin::where('username_admin',$username)->where('status',2)->first();
            if($admin==null){
                return redirect()->back()->with(['error'=>'Incorrect Username or Password ']);
            }
            else{
                if(!password_verify($pass,$admin['password_admin'])){
                    return redirect()->back()->with(['error'=>'Incorrect Username or Password ']);
                }
                return redirect()->route('homeadmin');
            }
        }
    }
    function logout(){
        Session::remove('custLog');
        return redirect()->route('loginCustomer');
    }
}