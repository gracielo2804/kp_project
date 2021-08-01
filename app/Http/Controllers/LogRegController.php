<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LogRegController extends Controller
{
    //
    // public function login(Request $request)
    // { 

    //     $nama=$request->username;
    //     $data = Users::where('username',$nama)->count();
    //     $datauser=Users::where('username',$nama)->get();
    //     $password=$request->pass;
    //     if($data>0){            
    //         foreach ($datauser as $key => $value) {
    //             if($value->password==$password){
    //                 Session::put("active",$nama);
    //                 Session::put("activeid",$value->id);
    //                 if($request->has('checkremember'))Session::put("activedd",$value->id);
    //                 return redirect()->route('home');
    //             }
    //             else
    //             {
    //                 return redirect()->back()->with("errorrr","Password Salah");
    //             }
    //         }            
    //     }
    //     else{
    //         return redirect()->back()->with("errorrr","Username Tidak Ditemukan");
    //     }
    // }
    public function register(Request $request)
    {              
        $to_name =  $request->nama;
        $to_email = $request->email;
        $hash = md5( rand(0,1000000000000000) );   // Generate random 32 character hash and assign it to a local variable.
                                            // Example output: f4552671f8909587cf485ea990207f3b
        $data = array('nama'=>$request->nama, "body" => "Your verification code :".$hash);
        Mail::send('email', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Pray & Go Account Verification');
        $message->from('proyekfaitravel@gmail.com','Verifivation Code');
        }); 
        // $input = $request->validate([
        //     "username"      => "required",
        //     "pass"          => ["required","min:5","regex:/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]*$/"],
        //     "conpass"       =>"required|same:pass",           
        // ],
        // [
        //     'username.required'     =>"Username Harus Diisi",
        //     'pass.min'              =>"Password Minimal 5 Karakter",
        //     'pass.regex'            =>"Password Minimal 5 Karakter dan terdapat 1 angka",
        //     'pass.required'         =>"Password Harus Diisi",            
        //     'conpass.required'      =>"Confirmation Password Harus Diisi",
        //     "conpass.same"          =>"Confirmation Password Harus sama dengan Password"
        // ]);
        // $nama = $input["username"];
        // $data = Users::where('username',$nama)->count();
        // if($data<=0){
        //     Users::insertGetId(
        //         [
        //             'username'=>$input["username"],
        //             'password'=>$input["pass"]
        //         ]
        //     );
        //     return redirect()->route('login');
        // }
        // else{
        //     $errorrr="Username Sudah Digunakan";
        //     return redirect()->route('register')->with("errorrr",$errorrr);
        // }        
    }
    // public function loginPage(Request $request)
    // { 
    //     if(Session::has('activedd')){
    //         return redirect()->route('home');
    //     }        
    //     else return view('login');
    // }
    // public function logout()
    // {
    //     Session::forget("active");
    //     Session::forget("activeid");
    //     Session::forget("activedd");
    //     Session::forget("follower");
    //     Session::forget("following");
    //     Session::forget("listteman");
    //     Session::forget('datapostingteman');
    //     Session::forget('idteman');
    //     return redirect("/");        
    // }
}
