<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\listBank;
use App\Models\historyDeposit;
use App\Models\historyWithdrawal;
use App\Models\ListEditProfile;
use App\Models\paketInvestassi;
use App\Http\Controllers\customerController\refreshSession;
use App\Models\kontrak_paket;

class customerController extends Controller
{
    //
    public function refreshSession($username){
        $customer = Customer::where('username_customer',$username)->first();
        Session::put('custLog',$customer);
    }
    public function landingPage(){
        if(Session::has('custLogremember')){
            if(Session::get('custLogremember')){
                return redirect()->route('homecust');
            }            
        }
        else{
            Session::remove('custLog');
            Session::remove('custLogremember');
            $dataPaket=paketInvestassi::where('status',1)->get();
            return view('home',["dataPaket"=>$dataPaket]);
        }
        Session::remove('custLog');
        Session::remove('custLogremember');
        $dataPaket=paketInvestassi::where('status',1)->get();
        return view('home',["dataPaket"=>$dataPaket]);
        // dd(Session::get('custLog'));
        
    }

    public function homePage(){
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);
        // dd(Session::get('custLog'));
        $dataPaket=paketInvestassi::where('status',1)->get();
        $dataInvestasi=kontrak_paket::where('username_cust',$dataCustomer['username_customer'])->get();
        $totalInvestasi=0;
        foreach($dataInvestasi as $value){
            if($value['status']==1){
                $totalInvestasi+=$value['jumlah_investasi'];
            }
        }       
        return view('index',["dataPaket"=>$dataPaket,"totalInvestasi"=>number_format($totalInvestasi)]);
    }
    
    public function depositPage(){
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);
        $listbank= listBank::where('status',1)->get();
        return view('deposit')->with(['listBank'=>$listbank]);
    }

    public function withdrawPage(){
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);
        $customer = Session::get('custLog');
        return view('withdraw',['customer'=>$customer]);
    }
    public function withdraw(Request $request){

        $jumlahData=DB::select("SELECT count(id_wd) as jumlah from history_withdrawal WHERE Date(`tanggal_wd`)=CURDATE();");
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
        $id="WD".$date.$ctrString;
        $withdraw = $request->jumlahwithdraw;
        $withdraw_separate = explode(".", $withdraw);
        $withdraw_ammount=0;
        $ctr_pangkat=0;
        if(count($withdraw_separate)>1){
            for ($x = count($withdraw_separate)-1; $x >= 0; $x--) {
                $temp=$withdraw_separate[$x]*(pow(10,$ctr_pangkat*3));
                $ctr_pangkat++;
                $withdraw_ammount+=$temp;
            }
        }
        else {
            $withdraw_ammount=(int)$withdraw_separate[0];
        }
        $dataCustomer = Session::get('custLog');

        // $file->move($tujuanfile,$fileName.".".$fileExtensions);
        historyWithdrawal::insert([
            "id_wd"=> $id,
            "username_cust"=>$dataCustomer['username_customer'],
            "jumlah_wd"=>$withdraw_ammount,
            "bank_tujuan"=>$request->nama_bank,
            "norek_tujuan"=>$request->norek,
            "an_norek_tujuan"=>$request->an,
            "status_wd"=>1
        ]);
        Customer::where("username_customer",$dataCustomer['username_customer'])->update(['saldo'=>(int)$dataCustomer['saldo']-(int)$withdraw_ammount]);
        $this->refreshSession($dataCustomer['username_customer']);
        return redirect()->back()->with(['success'=>'Berhasil Request Withdraw, Silahkan cek status pada halaman history withdraw']);

    }

    public function hisWithdrawPage(){ 
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);       
        // dd(Session::get('custLog'));
        $data=historyWithdrawal::where('username_cust',Session::get('custLog')['username_customer'])->get();
        return view('historyWithdraw',["data"=>$data]);
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

        $deposit = $request->jumlahDeposit;
        $deposit_separate = explode(".", $deposit);
        $deposit_ammount=0;
        $ctr_pangkat=0;
        if(count($deposit_separate)>1){
            for ($x = count($deposit_separate)-1; $x >= 0; $x--) {
                $temp=$deposit_separate[$x]*(pow(10,$ctr_pangkat*3));
                $ctr_pangkat++;
                $deposit_ammount+=$temp;
            }
        }
        else {
            $deposit_ammount=(int)$deposit_separate[0];
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
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);       
        // dd(Session::get('custLog'));
        $data=historyDeposit::where('username_cust',Session::get('custLog')['username_customer'])->get();
        $dataBankTujuan=listBank::get();
        return view('historyDeposit',["data"=>$data,"databank"=>$dataBankTujuan]);
    }
    public function editProfilePage(){         
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);       
        $dataBankTujuan=listBank::get();
        return view('editProfile',["dataCustomer"=>$dataCustomer]);
    }

    public function editProfile(Request $request){
        $pass=$request['passwordsekarang'];
        if(!password_verify($pass,Session::get('custLog')['password_customer'])){
            return redirect()->back()->with(['error'=>'Incorrect Password ']);
        }
        else{
            $DataSebelum=ListEditProfile::where('username_cust',$request->username)->get();
            $jumlahData=$DataSebelum->count();
            if($jumlahData>0){
                $dataLama=ListEditProfile::where('username_cust',$request->username)->where('status',1)->get();
                foreach($dataLama as $value){
                    $value->status=4;
                    $value->save();
                }
            }
            if($request->newpassword!=""||$request->newpassword!=null){
                $pass==$request->newpassword;
                $pass=password_hash($pass,PASSWORD_DEFAULT);
            }
            else{
                $pass=Session::get('custLog')['password_customer'];
            }
            // dd($pass);
            ListEditProfile::insert([
                "username_cust"=> $request->username,
                "nama_cust"=>$request->username,
                "telp_cust"=>$request->notelp,
                "email_cust"=>$request->email,
                "password_cust"=>$pass,
                "namabank_cust"=>$request->nama_bank,
                "norek_cust"=>$request->norek,
                "an_cust"=>$request->an_bank,
                "status"=>1
            ]);
            return redirect()->back()->with(['success'=>'Berhasil Melakukan Request Edit Profile ']);
        }
    }
    public function cekPIN($pin){
        $datacust=Session::get('custLog');
        return password_verify($pin,$datacust['pin_customer']);
    }

    public function invest(Request $request){
        $datapaket=paketInvestassi::where('id_paket',$request->idPaketInput)->first();
        $durasi=$datapaket['durasi_kontrak'];
        $jumlahData=DB::select("SELECT count(id_transaksi) as jumlah from kontrak_paket WHERE Date(`tanggal_pembelian`)=CURDATE();");
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
        $plusmonth="+".$durasi." month";
        $expired = date("Y-m-d H:i:s", strtotime($plusmonth));
        $id="TRX".$date.$ctrString;
        kontrak_paket::insert([
            "id_transaksi"=>$id,
            "username_cust"=> Session::get('custLog')['username_customer'],
            "id_paket"=>$request->idPaketInput,
            "tanggal_expired"=>$expired,
            "jumlah_investasi"=>$request->jumlahInvest,
            "status"=>1,
        ]);
        Customer::where("username_customer",Session::get('custLog')['username_customer'])->update(['saldo'=>(int)Session::get('custLog')['saldo']-(int)$request->jumlahInvest]);
        $this->refreshSession(Session::get('custLog')['username_customer']);
        return redirect()->route('hisInvest');
    }

    public function investPage(){         
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);       
        $datapaket=paketInvestassi::where('status',1)->get();
        return view('invest',["customer"=>$dataCustomer,"dataPaket"=>$datapaket]);
    }


    public function hisInvestPage(){ 
        $dataCustomer = Session::get('custLog');
        $this->refreshSession($dataCustomer['username_customer']);       
        $data=kontrak_paket::where('username_cust',Session::get('custLog')['username_customer'])->get(); 
        $datapaket=paketInvestassi::get();      
        return view('historyInvest',["data"=>$data,"dataPaket"=>$datapaket]);
    }
}
