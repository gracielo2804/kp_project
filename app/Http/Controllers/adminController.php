<?php

namespace App\Http\Controllers;

use App\Models\historyDeposit;
use App\Models\listBank;
use App\Models\Customer;
use App\Models\historyWithdrawal;
use App\Models\ListEditProfile;
use App\Models\modlog;
use App\Models\Admin;
use App\Models\paketInvestassi;
use Illuminate\Http\Request;

class adminController extends Controller
{
    // PAKET //
    public function listPaket(){
        $data=paketInvestassi::get();
        return view('AdminListPaket',["data"=>$data]);
    }
    public function pageAddPaket(){
        return view('AdminAddPaket');
    }
    public function confAddPaket(Request $request){
        $jumlahData=paketInvestassi::count();
        $ctr = $jumlahData+1;
        $id="GBPK".$ctr;
        $file=$request->file('img');
        if($file==null){
            return redirect()->back()->with(['error','Wajib Upload Gambar Paket!']);
        }
        $tujuanfile='gambarPaket';
        $fileExtensions=$file->getClientOriginalExtension();
        $fileName=$id;
        $file->move($tujuanfile,$fileName.".".$fileExtensions);
        paketInvestassi::insert([
            "nama_paket"=> $request->namapaket,
            "keterangan_paket"=>$request->keteranganpaket,
            "gambar_paket"=>"gambarPaket/".$fileName.".".$fileExtensions,
            "minimal_investasi"=>$request->mininvest,
            "presentase_profit"=>$request->persentase,
            "durasi_kontrak"=>$request->durasi,
            "status"=>1
        ]);
        modlog::insert([
            "username_admin"=> $request->session()->get('adminLog'),
            "keterangan" => "Menambahkan paket baru dengan ID = ". $ctr
        ]);
        return redirect()->back()->with(['success'=>'Berhasil Menambahkan paket investasi baru']);
    }
    public function nonaktif_paket($id_paket){
        paketInvestassi::where("id_paket", $id_paket)->update(['status'=>2]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Menonaktifkan paket baru dengan ID = ". $id_paket
        ]);
        return back()->with(['error'=>'Berhasil menonaktifkan paket investasi']);
    }
    public function aktif_paket($id_paket){
        paketInvestassi::where("id_paket",$id_paket)->update(['status'=>1]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Mengaktifkan paket baru dengan ID = ". $id_paket
        ]);
        return back()->with(['success'=>'Berhasil mengaktifkan paket investasi']);
    }
    public function edit_paketview($id){
        $data=paketInvestassi::where("id_paket",$id)->get();
        return view('AdminEditPaket',["data"=>$data]);
    }
    public function edit_paket(Request $request){
        $id="GBPK".$request->idpaket;
        $file=$request->file('img');
        if($file==null){
            return redirect()->back()->with(['error','Wajib Upload Gambar Paket!']);
        }
        $tujuanfile='gambarPaket';
        $fileExtensions=$file->getClientOriginalExtension();
        $fileName=$id;
        $file->move($tujuanfile,$fileName.".".$fileExtensions);
        paketInvestassi::where("id_paket",$request->idpaket)->update([
            'nama_paket'=>$request->namapaket,
            "keterangan_paket"=>$request->keteranganpaket,
            "gambar_paket"=>"gambarPaket/".$fileName.".".$fileExtensions,
            "minimal_investasi"=>$request->mininvest,
            "presentase_profit"=>$request->persentase,
            "durasi_kontrak"=>$request->durasi
        ]);
        modlog::insert([
            "username_admin"=> $request->session()->get('adminLog'),
            "keterangan" => "Mengubah data paket dengan ID = ". $request->idpaket
        ]);
        return redirect()->back()->with(['success'=>'Berhasil Merubah data paket investasi']);
    }


    public function listadmin(){
        $data=Admin::get();
        return view('AdminListAdmin',["data"=>$data]);
    }

    public function nonaktif_admin($username){
        Admin::where("username_admin", $username)->update(['status'=>2]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Menonaktifkan Admin dengan username = ". $username
        ]);
        return back()->with(['error'=>'Berhasil menon-aktifkan status akun admin dengan username'.$username]);
    }

    public function aktif_admin($username){
        Admin::where("username_admin", $username)->update(['status'=>1]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Berhasil mengaktifkan Admin dengan username = ". $username
        ]);
        return back()->with(['success'=>'Berhasil mengaktifkan status akun admin dengan username'.$username]);
    }

    public function pageAddAdmin(){
        return view('AdminAddAdmin');
    }
    public function add_admin(Request $req){
        Admin::insert([
            'username_admin'=>$req->user,
            'password_admin'=>password_hash($req->newpassword,PASSWORD_DEFAULT),
            'nama_admin'=>$req->nama,
            'telp_admin'=>$req->telp,
            'email_admin'=>$req->email,
            'status'=>1
        ]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Berhasil menambahkan Admin baru dengan username = ". $req->user
        ]);
        return back()->with(['success'=>'Berhasil menambahkan admin baru']);
    }

    public function edit_adminview($username){
        $data=Admin::where("username_admin",$username)->get();
        return view('AdminEditAdmin',["data"=>$data]);
    }
    public function edit_admin(Request $request){
        Admin::where("username_admin",$request->user1)->update([
            'password_admin'=>password_hash($request->newpassword,PASSWORD_DEFAULT),
            'nama_admin'=>$request->nama,
            'telp_admin'=>$request->telp,
            'email_admin'=>$request->email,
            'status'=>1
        ]);
        modlog::insert([
            "username_admin"=> $request->session()->get('adminLog'),
            "keterangan" => "Mengubah data Admin dengan Username = ". $request->user
        ]);
        return redirect()->back()->with(['success'=>'Berhasil Merubah data admin']);
    }


    // CUSTOMER //


    // PENDING WD //
    public function pending_wd(){
        $hwd = historyWithdrawal::where("status_wd",1)->get();
        $cust = Customer::get();
        $param["hwd"] = $hwd;
        $param["cust"] = $cust;
        return view('AdminPendingWd')->with($param);
    }

    public function acc_pending_wd(Request $request){
        $cust = Customer::where("username_customer",$request->username)->first();
        $uangcust = $cust["saldo"];
        $uangcust -= $request->saldo;
        $file=$request->file('img');
        if($file==null){
            return redirect()->back()->with(['error','Wajib Upload Bukti Transfer!']);
        }
        $tujuanfile='buktiTransfer';
        $fileExtensions=$file->getClientOriginalExtension();
        $fileName=$request->idpaket;
        $file->move($tujuanfile,$fileName.".".$fileExtensions);
        $hwd = historyWithdrawal::where("id_wd",$request->idpaket)->update(['status_wd'=>2, 'bukti_trf'=> "buktiTransfer/".$fileName.".".$fileExtensions]);
        Customer::where("username_customer",$request->username)->update(['saldo'=>$uangcust]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Mengkonfirmasi Withdrawal dengan ID = ". $request->idpaket
        ]);
        return back()->with(['success'=>'Berhasil mengkonfirmasi withdrawal user '.$request->username]);
    }

    public function dec_pending_wd(Request $request){
        $hdepo = historyWithdrawal::where("id_wd",$request->idpaket)->update(['status_wd'=>3,'keterangan'=> $request->keterangan]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Menolak Withdrawal dengan ID = ". $request->idpaket
        ]);
        return back()->with(['error'=>'Menolak Withdrawal user '.$request->username]);
    }

    // PENDING DEPO //
    public function pending_depo(){
        $hdepo = historyDeposit::where("status",1)->get();
        $bank = listBank::get();
        $param["hdepo"] = $hdepo;
        $param["bank"] = $bank;
        return view('AdminPendingDepo')->with($param);
    }
    public function acc_pending_depo($id, $username, $saldo){
        $cust = Customer::where("username_customer",$username)->first();
        $uangcust = $cust["saldo"];
        $uangcust += $saldo;
        $hdepo = historyDeposit::where("id_depo",$id)->update(['status'=>2]);
        Customer::where("username_customer",$username)->update(['saldo'=>$uangcust]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Mengkonfirmasi Deposit dengan ID = ". $id
        ]);
        return back()->with(['success'=>'Berhasil mengkonfirmasi deposit user '.$username]);
    }
    public function dec_pending_depo(Request $request){
        $hdepo = historyDeposit::where("id_depo",$request->idpaket)->update(['status'=>3,'keterangan'=> $request->keterangan]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Menolak Deposit dengan ID = ". $request->idpaket
        ]);
        return back()->with(['error'=>'Menolak deposit user '.$request->username]);
    }


    // PENDING EDIT PROF //
    public function pending_edit_profile(){
        $ecust = ListEditProfile::where("status",1)->get();
        $cust =  Customer::get();
        $param["ecust"] = $ecust;
        $param["cust"] = $cust;
        return view('AdminPendingEditProfile')->with($param);
    }

    public function acc_pending_edit_profile($username, $pw, $nama, $telp,$email,$bank,$rek,$an){
        $cust = Customer::where("username_customer",$username)->update(['password_customer'=>$pw,"telp_customer"=>$telp,"email_customer"=>$email,"namabank_customer"=>$bank,"norek_customer"=>$rek,"an_customer"=>$an]);
        ListEditProfile::where("username_cust",$username)->where("status",1)->update(["status"=>2]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Mengkonfirmasi Request Update Profile user dengan Username = ". $username
        ]);
        return back()->with(['success'=>'Berhasil mengkonfirmasi edit profile user '.$username]);
    }

    public function dec_pending_edit_profile(Request $request){
        $hdepo = ListEditProfile::where("username_cust",$request->username)->where("status",1)->update(['status'=>3,'keterangan'=> $request->keterangan]);
        modlog::insert([
            "username_admin"=> session()->get('adminLog'),
            "keterangan" => "Menolak Request Update Profile user dengan Username = ". $request->username
        ]);
        return back()->with(['error'=>'Menolak request edit profile user '.$request->username]);
    }

    public function logadmin(){
        $data=modlog::get();
        return view('AdminLog',["data"=>$data]);
    }
}
