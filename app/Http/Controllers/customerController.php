<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\listBank;
use App\Models\historyDeposit;

class customerController extends Controller
{
    //
    public function refreshSession($username){
        $customer = Customer::where('username_customer',$username)->first();
        Session::put('custLog',$customer);
    }
    public function depositPage(){
        $listbank= listBank::where('status',1)->get();        
        return view('deposit')->with(['listBank'=>$listbank]);
    }

    public function deposit(Request $request){

        $jumlahData=DB::select("SELECT count(id_depo) as jumlah from history_deposit WHERE Date(`tanggal_depo`)=CURDATE();");
        $ctr=$jumlahData[0]->jumlah+1;
        $ctrString="";
        if($ctr<10){
            $ctrString="0000".$ctr;
        }
        else if($ctr>=10 && $ctr<100){
            $ctrString="000".$ctr;
        }
        else if($ctr>=100 && $ctr<1000){
            $ctrString="00".$ctr;
        }
        else if($ctr>=1000 && $ctr<10000){
            $ctrString="0".$ctr;
        }
        else if($ctr>=10000 && $ctr<100000){
            $ctrString="".$ctr;
        }
        $date=date("dmy");
        $id="DP".$date.$ctrString;                    
        $file=$request->file('img');
        if($file==null){
            return redirect()->back()->with(['error','Wajib Upload Bukti Transfer !']);
        }
        $tujuanfile='buktiTransfer';
        $fileExtensions=$file->getClientOriginalExtension();
        $fileName=$id;        
        $dataCustomer = Session::get('custLog');
        $file->move($tujuanfile,$fileName.".".$fileExtensions);
        historyDeposit::insert([
            "id_depo"=> $id,
            "username_cust"=>$dataCustomer['username_customer'],
            "jumlah_depo"=>$request->jumlahDeposit,
            "bank_cust"=>$dataCustomer["namabank_customer"],
            "norek_cust"=>$dataCustomer["norek_customer"],
            "an_cust"=>$dataCustomer["an_customer"],
            "id_bank_tujuan"=>$request->bankTujuan,
            "bukti_trf"=>"buktiTransfer/".$fileName.".".$fileExtensions,
            "status"=>1
        ]);
        return redirect()->back()->with(['success'=>'Berhasil input data deposit, Tunggu konfirmasi admin']);
    }

    public function hisDepositPage(){    
        $data=historyDeposit::where('username_cust',Session::get('custLog')['username_customer'])->get();
        $dataBankTujuan=listBank::get();
        return view('historyDeposit',["data"=>$data,"databank"=>$dataBankTujuan]);
    }
}
