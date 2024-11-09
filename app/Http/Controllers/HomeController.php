<?php

namespace App\Http\Controllers;

use App\Models\KK;
use App\Models\Penduduk;
use App\Models\Pendatang;
use App\Models\Pindah;
use App\Models\Lahir;
use App\Models\Meninggal;
use App\Models\User;
use App\Models\Roles;
use App\Models\Profile;
use Session;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function masuk()
    {
        return view('auth.logins');
    }    
    public function pelayanan(Request $req)
    {
        $nik = Penduduk::where('nik',$req->get('nik'))->value('nik');
        if($nik == null){
            Session::flash('status', 'NIK yang anda masukan salah atau Belum Terdaftar');
            return redirect()->route('masuk');
        }else{
            $penduduk = Penduduk::where('nik',$req->get('nik'))->get();
            return view('dashboard', compact('penduduk','nik'));
        }
       
    }    
    public function pendatang($nik)
    {
            $nama = Penduduk::where('nik',$nik)->value('nama');
            $pendatang = pendatang::where('pelapor',$nama)->get();
            $nik = Penduduk::where('nik',$nik)->value('nik');
            return view('pendatang', compact('pendatang','nik'));
       
    }    
    public function pindah($nik)
    {
            $nama = Penduduk::where('nik',$nik)->value('nama');
            $pindah = pindah::where('pelapor',$nama)->get();
            $nik = Penduduk::where('nik',$nik)->value('nik');
            return view('pindah', compact('pindah','nik'));
       
    }    
    public function lahir($nik)
    {
            $nama = Penduduk::where('nik',$nik)->value('nama');
            $lahir = lahir::where('pelapor',$nama)->get();
            $nik = Penduduk::where('nik',$nik)->value('nik');
            return view('lahir', compact('lahir','nik'));
       
    }    
    public function meninggal($nik)
    {
            $nama = Penduduk::where('nik',$nik)->value('nama');
            $meninggal = Meninggal::where('pelapor',$nama)->get();
            $nik = Penduduk::where('nik',$nik)->value('nik');
            return view('meninggal', compact('meninggal','nik'));
       
    }    
    public function pelayanans($nik)
    {
        $nik = Penduduk::where('nik',$nik)->value('nik');
            $penduduk = Penduduk::where('nik',$nik)->get();
            return view('dashboard', compact('penduduk','nik'));
        }
        public function submit_pendatang(Request $req){
            { $validate = $req->validate([
                'nik'=> 'required|unique:pendatangs',
                'nama'=> 'required',
                'tgl_datang'=> 'required',
                'gender'=> 'required',
                'pengantar'=> 'required',
                'kk'=> 'required',
                'ktp'=> 'required',
                
            ]);
            $pendatang = new Pendatang;
            $pendatang->nik = $req->get('nik');
            $pendatang->nama = $req->get('nama');
            $pendatang->tgl_datang = $req->get('tgl_datang');
            $pendatang->gender = $req->get('gender');
            $pendatang->approve = 0;
            if($req->hasFile('pengantar'))
            {
                $extension = $req->file('pengantar')->extension();
                $filename = 'pengantar'.time().'.'.$extension;
                $req->file('pengantar')->storeAS('public/pengantar', $filename);
                $pendatang->pengantar = $filename;
            }
            if($req->hasFile('kk'))
            {
                $extension = $req->file('kk')->extension();
                $filename = 'kk'.time().'.'.$extension;
                $req->file('kk')->storeAS('public/kk', $filename);
                $pendatang->kk = $filename;
            }
            if($req->hasFile('ktp'))
            {
                $extension = $req->file('ktp')->extension();
                $filename = 'ktp'.time().'.'.$extension;
                $req->file('ktp')->storeAS('public/ktp', $filename);
                $pendatang->ktp = $filename;
            }
            $nik = Penduduk::where('nik',$req->get('niks'))->value('nik');
            $pelapor = Penduduk::where('nik',$req->get('niks'))->value('nama');
            $pendatang->pelapor = $pelapor;
            $pendatang->save();
            Session::flash('status', 'Tambah data Pendatang berhasil!!!');
            return redirect()->back();
        }}

        public function submit_pindah(Request $req){
            { $validate = $req->validate([
                'nik'=> 'required',
                'tgl_pindah'=> 'required',
                'pengantar'=> 'required',
                'kk'=> 'required',
                'ktp'=> 'required',
                'alasan'=> 'required',
                
            ]);
            $id = Penduduk::where('nik',$req->get('nik'))->value('id');
            if($id != null){
                Session::flash('warning', 'Token has been already');
                return redirect()->route('admin.pindah');
            }
            else{
            $pindah = new Pindah;
            $pindah->penduduk_id = $id;
            $pindah->tgl_pindah = $req->get('tgl_pindah');
            $pindah->approve = 0;
            if($req->hasFile('pengantar'))
            {
                $extension = $req->file('pengantar')->extension();
                $filename = 'pengantar'.time().'.'.$extension;
                $req->file('pengantar')->storeAS('public/pengantar', $filename);
                $pindah->pengantar = $filename;
            }
            if($req->hasFile('kk'))
            {
                $extension = $req->file('kk')->extension();
                $filename = 'kk'.time().'.'.$extension;
                $req->file('kk')->storeAS('public/kk', $filename);
                $pindah->kk = $filename;
            }
            if($req->hasFile('ktp'))
            {
                $extension = $req->file('ktp')->extension();
                $filename = 'ktp'.time().'.'.$extension;
                $req->file('ktp')->storeAS('public/ktp', $filename);
                $pindah->ktp = $filename;
            }
            $pindah->alasan = $req->get('alasan');
            $nik = Penduduk::where('nik',$req->get('niks'))->value('nik');
            $pelapor = Penduduk::where('nik',$req->get('niks'))->value('nama');
            $pindah->pelapor = $pelapor;
            $pindah->save();
            Session::flash('status', 'Tambah data Pindah berhasil!!!');
            return redirect()->back();
            }}}

            public function submit_meninggal(Request $req){
                { $validate = $req->validate([
                    'nik'=> 'required',
                    'tgl_meninggal'=> 'required',
                    'sebab'=> 'required',
                    'pengantar'=> 'required',
                    'kk'=> 'required',
                    'ktp'=> 'required',
                    'sk_kematian'=> 'required',
                    'ktp_pelapor'=> 'required',
                    
                ]);
                $id = Penduduk::where('nik',$req->get('nik'))->value('id');
                if($id != null){
                    Session::flash('warning', 'Token has been already');
                    return redirect()->route('admin.meninggal');
                }
                $meninggal = new Meninggal;
                $meninggal->penduduk_id = $id;
                $meninggal->tgl_meninggal = $req->get('tgl_meninggal');
                $meninggal->sebab = $req->get('sebab');
                $meninggal->approve = 0;
                if($req->hasFile('pengantar'))
                {
                    $extension = $req->file('pengantar')->extension();
                    $filename = 'pengantar'.time().'.'.$extension;
                    $req->file('pengantar')->storeAS('public/pengantar', $filename);
                    $meninggal->pengantar = $filename;
                }
                if($req->hasFile('kk'))
                {
                    $extension = $req->file('kk')->extension();
                    $filename = 'kk'.time().'.'.$extension;
                    $req->file('kk')->storeAS('public/kk', $filename);
                    $meninggal->kk = $filename;
                }
                if($req->hasFile('ktp'))
                {
                    $extension = $req->file('ktp')->extension();
                    $filename = 'ktp'.time().'.'.$extension;
                    $req->file('ktp')->storeAS('public/ktp', $filename);
                    $meninggal->ktp = $filename;
                }
                if($req->hasFile('sk_kematian'))
                {
                    $extension = $req->file('sk_kematian')->extension();
                    $filename = 'sk_kematian'.time().'.'.$extension;
                    $req->file('sk_kematian')->storeAS('public/sk_kematian', $filename);
                    $meninggal->sk_kematian = $filename;
                }
                if($req->hasFile('ktp_pelapor'))
                {
                    $extension = $req->file('ktp_pelapor')->extension();
                    $filename = 'ktp_pelapor'.time().'.'.$extension;
                    $req->file('ktp_pelapor')->storeAS('public/ktp_pelapor', $filename);
                    $meninggal->ktp_pelapor = $filename;
                }
                $nik = Penduduk::where('nik',$req->get('niks'))->value('nik');
                $pelapor = Penduduk::where('nik',$req->get('niks'))->value('nama');
                $meninggal->pelapor = $pelapor;
                $meninggal->save();
                Session::flash('status', 'Tambah data Meninggal berhasil!!!');
                return redirect()->route('masuk');
            }}

            public function submit_lahir(Request $req){
                { $validate = $req->validate([
                    'no_kk'=> 'required',
                    'nama'=> 'required',
                    'tempat_lahir'=> 'required',
                    'tgl_lahir'=> 'required',
                    'kk'=> 'required',
                    'ktp'=> 'required',
                    'gender'=> 'required',
                    'sbidan'=> 'required',
                    
                ]);
                $id = KK::where('no_kk',$req->get('no_kk'))->value('id');
                $lahir = new Lahir;
                $lahir->k_k_S_id = $id;
                $lahir->nama = $req->get('nama');
                $lahir->tgl_lahir = $req->get('tgl_lahir');
                $lahir->tempat_lahir = $req->get('tempat_lahir');
                $lahir->gender = $req->get('gender');
                $lahir->approve = 0;
                if($req->hasFile('sbidan'))
                {
                    $extension = $req->file('sbidan')->extension();
                    $filename = 'sbidan'.time().'.'.$extension;
                    $req->file('sbidan')->storeAS('public/sbidan', $filename);
                    $lahir->sbidan = $filename;
                }
                if($req->hasFile('kk'))
                {
                    $extension = $req->file('kk')->extension();
                    $filename = 'kk'.time().'.'.$extension;
                    $req->file('kk')->storeAS('public/kk', $filename);
                    $lahir->kk = $filename;
                }
                if($req->hasFile('ktp'))
                {
                    $extension = $req->file('ktp')->extension();
                    $filename = 'ktp'.time().'.'.$extension;
                    $req->file('ktp')->storeAS('public/ktp', $filename);
                    $lahir->ktp = $filename;
                }
                $nik = Penduduk::where('nik',$req->get('niks'))->value('nik');
                $pelapor = Penduduk::where('nik',$req->get('niks'))->value('nama');
                $lahir->pelapor = $pelapor;
                $lahir->save();
                Session::flash('status', 'Tambah data Meninggal berhasil!!!');
                return redirect()->route('masuk');
            }}

        public function print_pendatang($id)
        {
            $user = Auth::user();
            $no = $id;
            $pendatang = Pendatang::where('id',$id)->get();
            $tanggal = Pendatang::where('id',$id)
                ->value(DB::raw('DATE(`created_at`)'));
           
            $dibuat = Carbon::now()->format('d M Y');
            $ttd = User::where('roles_id','=',2)->get();
            $pdf = PDF::loadview('cetak_datang',['no'=>$no,'pendatang'=>$pendatang,'tanggal'=>$tanggal,
            'dibuat'=>$dibuat, 'ttd'=>$ttd,]);
            set_time_limit(300);
            return $pdf->stream('surat_pendatang.pdf');
        }

        public function print_pindah($id)
    {
        $user = Auth::user();
        $no = $id;
        $pindah = Pindah::where('id',$id)->get();
        $tanggal = Pindah::where('id',$id)
            ->value(DB::raw('DATE(`created_at`)'));
       
        $dibuat = Carbon::now()->format('d M Y');
        $ttd = User::where('roles_id','=',2)->get();
        $pdf = PDF::loadview('cetak_pindah',['no'=>$no,'pindah'=>$pindah,'tanggal'=>$tanggal,
        'dibuat'=>$dibuat, 'ttd'=>$ttd,]);
        set_time_limit(300);
        return $pdf->stream('surat_pindah.pdf');
    }

    public function print_meninggal($id)
    {
        $user = Auth::user();
        $no = $id;
        $meninggal = Meninggal::where('id',$id)->get();
        $tanggal = Meninggal::where('id',$id)
            ->value(DB::raw('DATE(`created_at`)'));
       
        $dibuat = Carbon::now()->format('d M Y');
        $ttd = User::where('roles_id','=',2)->get();
        $pdf = PDF::loadview('cetak_mati',['no'=>$no,'meninggal'=>$meninggal,'tanggal'=>$tanggal,
        'dibuat'=>$dibuat, 'ttd'=>$ttd,]);
        set_time_limit(300);
        return $pdf->stream('surat_meninggal.pdf');
    }
  
    public function print_lahir($id)
    {
        $user = Auth::user();
        $no = $id;
        $lahir = Lahir::where('id',$id)->get();
        $tanggal = Lahir::where('id',$id)
            ->value(DB::raw('DATE(`created_at`)'));
       
        $dibuat = Carbon::now()->format('d M Y');
        $ttd = User::where('roles_id','=',2)->get();
        $pdf = PDF::loadview('cetak_lahir',['no'=>$no,'lahir'=>$lahir,'tanggal'=>$tanggal,
        'dibuat'=>$dibuat, 'ttd'=>$ttd,]);
        set_time_limit(300);
        return $pdf->stream('surat_lahir.pdf');
    }
    }    

