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

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kk = KK::count();
        $penduduk = Penduduk::count();
        $pendatang = Pendatang::count();
        $user = Auth::user();
        $pindah = Pindah::Count();
        $lahir = Lahir::Count();
        $meninggal = Meninggal::Count();
        $pengguna = User::Count();
        return view('admin.Dashboard', compact('user','kk','penduduk','pendatang','pindah','lahir','meninggal','pengguna'));
    }
    
    public function kk(){
        $user = Auth::user();
        $kk = KK::all();
        return view('admin.kk', compact('user','kk'));
    }

    public function submit_kk(Request $req){
        { $validate = $req->validate([
            'no_kk'=> 'required|unique:k_k_s',
            'kepala'=> 'required',
            'rt'=> 'required',
            'rw'=> 'required',
            'desa'=> 'required',
            'kecamatan'=> 'required',
            'kabupaten'=> 'required',
            'provinsi'=> 'required',
        ]);
        $kk = new KK;
        $kk->no_kk = $req->get('no_kk');
        $kk->kepala = $req->get('kepala');
        $kk->rt = $req->get('rt');
        $kk->rw = $req->get('rw');
        $kk->desa = $req->get('desa');
        $kk->kecamatan = $req->get('kecamatan');;
        $kk->kabupaten = $req->get('kabupaten');;
        $kk->provinsi = $req->get('provinsi');;
        $kk->save();
        Session::flash('status', 'Tambah data KK berhasil!!!');
        return redirect()->route('admin.kk');
    }}
    
    public function update_kk(Request $req){
        $kk= KK::find($req->get('id'));
        { $validate = $req->validate([
            'no_kk'=> 'required',
            'kepala'=> 'required',
            'rt'=> 'required',
            'rw'=> 'required',
            'desa'=> 'required',
            'kecamatan'=> 'required',
            'kabupaten'=> 'required',
            'provinsi'=> 'required',
        ]);
        $kk->no_kk = $req->get('no_kk');
        $kk->kepala = $req->get('kepala');
        $kk->rt = $req->get('rt');
        $kk->rw = $req->get('rw');
        $kk->desa = $req->get('desa');
        $kk->kecamatan = $req->get('kecamatan');;
        $kk->kabupaten = $req->get('kabupaten');;
        $kk->provinsi = $req->get('provinsi');;
        $kk->save();
        Session::flash('status', 'Ubah data KK berhasil!!!');
        return redirect()->route('admin.kk');
    }}

    public function getDataKk($id)
    {
        $kk = KK::find($id);
        return response()->json($kk);
    }

    public function delete_kk($id)
    {
        $kk = KK::find($id);
        $kk->delete();
        $success = true;
        $message = "Data KK Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
       
    }
    public function penduduk(){
        $user = Auth::user();
        $penduduk = Penduduk::all();
        return view('admin.penduduk', compact('user','penduduk'));
    }

    public function submit_penduduk(Request $req){
        { $validate = $req->validate([
            'no_kk'=> 'required',
            'nik'=> 'required|unique:penduduks',
            'nama'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'gender'=> 'required',
            'agama'=> 'required',
            'pendidikan'=> 'required',
            'pekerjaan'=> 'required',
            'status'=> 'required',
            
        ]);
        $id = KK::where('no_kk',$req->get('no_kk'))->value('id');
        $penduduk = new Penduduk;
        $penduduk->k_k_s_id = $id;
        $penduduk->nik = $req->get('nik');
        $penduduk->nama = $req->get('nama');
        $penduduk->tempat_lahir = $req->get('tempat_lahir');
        $penduduk->tgl_lahir = $req->get('tgl_lahir');
        $penduduk->gender = $req->get('gender');
        $penduduk->agama = $req->get('agama');
        $penduduk->pendidikan = $req->get('pendidikan');
        $penduduk->pekerjaan = $req->get('pekerjaan');
        $penduduk->status = $req->get('status');
        $penduduk->save();
        Session::flash('status', 'Tambah data berhasil!!!');
        return redirect()->route('admin.penduduk');
    }}
    
    public function update_penduduk(Request $req){
        $penduduk= Penduduk::find($req->get('id'));
        { $validate = $req->validate([
            'no_kk'=> 'required',
            'nik'=> 'required',
            'nama'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'gender'=> 'required',
            'agama'=> 'required',
            'pendidikan'=> 'required',
            'pekerjaan'=> 'required',
            'status'=> 'required',
        ]);
        $penduduk->k_k_s_id = $req->get('no_kk');
        $penduduk->nik = $req->get('nik');
        $penduduk->nama = $req->get('nama');
        $penduduk->tempat_lahir = $req->get('tempat_lahir');
        $penduduk->tgl_lahir = $req->get('tgl_lahir');
        $penduduk->gender = $req->get('gender');
        $penduduk->agama = $req->get('agama');
        $penduduk->pendidikan = $req->get('pendidikan');
        $penduduk->pekerjaan = $req->get('pekerjaan');
        $penduduk->status = $req->get('status');
        $penduduk->save();
        Session::flash('status', 'Ubah data Penduduk berhasil!!!');
        return redirect()->route('admin.penduduk');
    }}

    public function getDataPenduduk($id)
    {
        $penduduk = Penduduk::find($id);
        return response()->json($penduduk);
    }

    public function delete_penduduk($id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->delete();
        $success = true;
        $message = "Data Penduduk Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
       
    }

    public function pendatang(){
        $user = Auth::user();
        $pendatang = Pendatang::all();
        return view('admin.pendatang', compact('user','pendatang'));
    }

    public function submit_pendatang(Request $req){
        { $validate = $req->validate([
            'nik'=> 'required|unique:penduduks',
            'nama'=> 'required',
            'tgl_datang'=> 'required',
            'gender'=> 'required',
            'pengantar'=> 'required',
            'kk'=> 'required',
            'ktp'=> 'required',
            'pelapor'=> 'required',
            
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
        $pendatang->pelapor = $req->get('pelapor');
        $pendatang->save();
        Session::flash('status', 'Tambah data Pendatang berhasil!!!');
        return redirect()->route('admin.pendatang');
    }}
    
    public function update_pendatang(Request $req){
        $pendatang= Pendatang::find($req->get('id'));
        { $validate = $req->validate([
          'nik'=> 'required',
            'nama'=> 'required',
            'tgl_datang'=> 'required',
            'gender'=> 'required',
            'pengantar'=> 'required',
            'kk'=> 'required',
            'ktp'=> 'required',
            'pelapor'=> 'required',
        ]);
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
            Storage::delete('public/pengantar/'.$req->get('old_pengantar'));
            $pendatang->pengantar = $filename;
        }
        if($req->hasFile('kk'))
        {
            $extension = $req->file('kk')->extension();
            $filename = 'kk'.time().'.'.$extension;
            $req->file('kk')->storeAS('public/kk', $filename);
            Storage::delete('public/kk/'.$req->get('old_kk'));
            $pendatang->kk = $filename;
        }
        if($req->hasFile('ktp'))
        {
            $extension = $req->file('ktp')->extension();
            $filename = 'ktp'.time().'.'.$extension;
            $req->file('ktp')->storeAS('public/ktp', $filename);
            Storage::delete('public/ktp/'.$req->get('old_ktp'));
            $pendatang->ktp = $filename;
        }
        $pendatang->pelapor = $req->get('pelapor');
        $pendatang->save();
        Session::flash('status', 'Ubah data Pendatang berhasil!!!');
        return redirect()->route('admin.pendatang');
    }}

    public function getDataPendatang($id)
    {
        $pendatang = Pendatang::find($id);
        return response()->json($pendatang);
    }

    public function delete_pendatang($id)
    {
        $pendatang = Pendatang::find($id);
        Storage::delete('public/pengantar/'.$pendatang->pengantar);
        Storage::delete('public/kk/'.$pendatang->kk);
        Storage::delete('public/ktp/'.$pendatang->ktp);
        $pendatang->delete();
        $success = true;
        $message = "Data Pendatang Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
       
    }
    public function terima_pendatang($id){
        $terima = DB::table('pendatangs')->where('id', $id)->update(['approve' => 1, ]);
        Session::flash('status', 'Pendatang Berhasil di Terima!!!');
        return redirect()->back();
    }
    public function tolak_pendatang($id){
        $terima = DB::table('pendatangs')->where('id', $id)->update([ 'approve' => 2,]);
        Session::flash('status', 'Pendatang Berhasil di Tolak!!!');
        return redirect()->back();
    }
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
    public function pindah(){
        $user = Auth::user();
        $pindah = Pindah::all();
        return view('admin.pindah', compact('user','pindah'));
    }

    public function submit_pindah(Request $req){
        { $validate = $req->validate([
            'nik'=> 'required',
            'tgl_pindah'=> 'required',
            'pengantar'=> 'required',
            'kk'=> 'required',
            'ktp'=> 'required',
            'alasan'=> 'required',
            'pelapor'=> 'required',
            
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
        $pindah->pelapor = $req->get('pelapor');
        $pindah->save();
        Session::flash('status', 'Tambah data Pindah berhasil!!!');
        return redirect()->route('admin.pindah');
        }}}
    
    public function update_pindah(Request $req){
        $pindah= Pindah::find($req->get('id'));
        { $validate = $req->validate([
         'nik'=> 'required',
            'tgl_pindah'=> 'required',
            'pengantar'=> 'required',
            'kk'=> 'required',
            'ktp'=> 'required',
            'alasan'=> 'required',
            'pelapor'=> 'required',
        ]);
        $pindah->penduduk_id = $req->get('nik');
        $pindah->tgl_pindah = $req->get('tgl_pindah');
        $pindah->approve = 0;
        if($req->hasFile('pengantar'))
        {
            $extension = $req->file('pengantar')->extension();
            $filename = 'pengantar'.time().'.'.$extension;
            $req->file('pengantar')->storeAS('public/pengantar', $filename);
            Storage::delete('public/pengantar/'.$req->get('old_pengantar'));
            $pindah->pengantar = $filename;
        }
        if($req->hasFile('kk'))
        {
            $extension = $req->file('kk')->extension();
            $filename = 'kk'.time().'.'.$extension;
            $req->file('kk')->storeAS('public/kk', $filename);
            Storage::delete('public/kk/'.$req->get('old_kk'));
            $pindah->kk = $filename;
        }
        if($req->hasFile('ktp'))
        {
            $extension = $req->file('ktp')->extension();
            $filename = 'ktp'.time().'.'.$extension;
            $req->file('ktp')->storeAS('public/ktp', $filename);
            Storage::delete('public/ktp/'.$req->get('old_ktp'));
            $pindah->ktp = $filename;
        }
        $pindah->alasan = $req->get('alasan');
        $pindah->pelapor = $req->get('pelapor');
        $pindah->save();
        Session::flash('status', 'Ubah data Pindah berhasil!!!');
        return redirect()->route('admin.pindah');
    }}

    public function getDataPindah($id)
    {
        $pindah = Pindah::find($id);
        return response()->json($pindah);
    }

    public function delete_pindah($id)
    {
        $pindah = Pindah::find($id);
        Storage::delete('public/pengantar/'.$pindah->pengantar);
        Storage::delete('public/kk/'.$pindah->kk);
        Storage::delete('public/ktp/'.$pindah->ktp);
        $pindah->delete();
        $success = true;
        $message = "Data Pendatang Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
       
    }
    public function terima_pindah($id){
        $terima = DB::table('pindahs')->where('id', $id)->update(['approve' => 1, ]);
        Session::flash('status', 'Pindah Berhasil di Terima!!!');
        return redirect()->back();
    }
    public function tolak_pindah($id){
        $terima = DB::table('pindahs')->where('id', $id)->update([ 'approve' => 2,]);
        Session::flash('status', 'Pindah Berhasil di Tolak!!!');
        return redirect()->back();
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
    public function meninggal(){
        $user = Auth::user();
        $meninggal = Meninggal::all();
        return view('admin.meninggal', compact('user','meninggal'));
    }

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
            'pelapor'=> 'required',
            
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
        $meninggal->pelapor = $req->get('pelapor');
        $meninggal->save();
        Session::flash('status', 'Tambah data Meninggal berhasil!!!');
        return redirect()->route('admin.meninggal');
    }}
    
    public function update_meninggal(Request $req){
        $meninggal= Meninggal::find($req->get('id'));
        { $validate = $req->validate([
        'nik'=> 'required',
            'tgl_meninggal'=> 'required',
            'sebab'=> 'required',
            'pengantar'=> 'required',
            'kk'=> 'required',
            'ktp'=> 'required',
            'sk_kematian'=> 'required',
            'ktp_pelapor'=> 'required',
            'pelapor'=> 'required',
            
        ]);
        $meninggal->penduduk_id = $req->get('nik');
        $meninggal->tgl_meninggal = $req->get('tgl_meninggal');
        $meninggal->sebab = $req->get('sebab');
        $meninggal->approve = 0;
        if($req->hasFile('pengantar'))
        {
            $extension = $req->file('pengantar')->extension();
            $filename = 'pengantar'.time().'.'.$extension;
            $req->file('pengantar')->storeAS('public/pengantar', $filename);
            Storage::delete('public/pengantar/'.$req->get('old_pengantar'));
            $meninggal->pengantar = $filename;
        }
        if($req->hasFile('kk'))
        {
            $extension = $req->file('kk')->extension();
            $filename = 'kk'.time().'.'.$extension;
            $req->file('kk')->storeAS('public/kk', $filename);
            Storage::delete('public/kk/'.$req->get('old_kk'));
            $meninggal->kk = $filename;
        }
        if($req->hasFile('ktp'))
        {
            $extension = $req->file('ktp')->extension();
            $filename = 'ktp'.time().'.'.$extension;
            $req->file('ktp')->storeAS('public/ktp', $filename);
            Storage::delete('public/ktp/'.$req->get('old_ktp'));
            $meninggal->ktp = $filename;
        }
        if($req->hasFile('sk_kematian'))
        {
            $extension = $req->file('sk_kematian')->extension();
            $filename = 'sk_kematian'.time().'.'.$extension;
            $req->file('sk_kematian')->storeAS('public/sk_kematian', $filename);
            Storage::delete('public/sk_kematian/'.$req->get('old_sk_kematian'));
            $meninggal->sk_kematian = $filename;
        }
        if($req->hasFile('ktp_pelapor'))
        {
            $extension = $req->file('ktp_pelapor')->extension();
            $filename = 'ktp_pelapor'.time().'.'.$extension;
            $req->file('ktp_pelapor')->storeAS('public/ktp_pelapor', $filename);
            Storage::delete('public/ktp_pelapor/'.$req->get('old_ktp_pelapor'));
            $meninggal->ktp_pelapor = $filename;
        }
        $meninggal->pelapor = $req->get('pelapor');
        $meninggal->save();
        Session::flash('status', 'Ubah data Meninggal berhasil!!!');
        return redirect()->route('admin.meninggal');
    }}

    public function getDataMeninggal($id)
    {
        $meninggal = Meninggal::find($id);
        return response()->json($meninggal);
    }

    public function delete_meninggal($id)
    {
        $meninggal = Meninggal::find($id);
        Storage::delete('public/pengantar/'.$meninggal->pengantar);
        Storage::delete('public/kk/'.$meninggal->kk);
        Storage::delete('public/ktp/'.$meninggal->ktp);
        Storage::delete('public/sk_kematian/'.$meninggal->sk_kematian);
        Storage::delete('public/ktp_pelapor/'.$meninggal->ktp_pelapor);
        $meninggal->delete();
        $success = true;
        $message = "Data Meninggal Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
       
    
    }
    public function terima_meninggal($id){
        $terima = DB::table('meninggals')->where('id', $id)->update(['approve' => 1, ]);
        Session::flash('status', 'Meninggal Berhasil di Terima!!!');
        return redirect()->back();
    }
    public function tolak_meninggal($id){
        $terima = DB::table('meninggals')->where('id', $id)->update([ 'approve' => 2,]);
        Session::flash('status', 'Meninggal Berhasil di Tolak!!!');
        return redirect()->back();
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
    public function lahir(){
        $user = Auth::user();
        $lahir = Lahir::all();
        return view('admin.lahir', compact('user','lahir'));
    }

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
            'pelapor'=> 'required',
            
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
        $lahir->pelapor = $req->get('pelapor');
        $lahir->save();
        Session::flash('status', 'Tambah data Meninggal berhasil!!!');
        return redirect()->route('admin.lahir');
    }}
    
    public function update_lahir(Request $req){
        $lahir= lahir::find($req->get('id'));
        { $validate = $req->validate([
       'no_kk'=> 'required',
            'nama'=> 'required',
            'tempat_lahir'=> 'required',
            'tgl_lahir'=> 'required',
            'kk'=> 'required',
            'ktp'=> 'required',
            'gender'=> 'required',
            'sbidan'=> 'required',
            'pelapor'=> 'required',
            
        ]);
        $lahir->k_k_s_id = $req->get('no_kk');
        $lahir->nama = $req->get('nama');
        $lahir->tempat_lahir = $req->get('tempat_lahir');
        $lahir->tgl_lahir = $req->get('tgl_lahir');
        $lahir->gender = $req->get('gender');
        $lahir->approve = 0;
        if($req->hasFile('sbidan'))
        {
            $extension = $req->file('sbidan')->extension();
            $filename = 'sbidan'.time().'.'.$extension;
            $req->file('sbidan')->storeAS('public/sbidan', $filename);
            Storage::delete('public/sbidan/'.$req->get('old_sbidan'));
            $lahir->sbidan = $filename;
        }
        if($req->hasFile('kk'))
        {
            $extension = $req->file('kk')->extension();
            $filename = 'kk'.time().'.'.$extension;
            $req->file('kk')->storeAS('public/kk', $filename);
            Storage::delete('public/kk/'.$req->get('old_kk'));
            $lahir->kk = $filename;
        }
        if($req->hasFile('ktp'))
        {
            $extension = $req->file('ktp')->extension();
            $filename = 'ktp'.time().'.'.$extension;
            $req->file('ktp')->storeAS('public/ktp', $filename);
            Storage::delete('public/ktp/'.$req->get('old_ktp'));
            $lahir->ktp = $filename;
        }
        $lahir->pelapor = $req->get('pelapor');
        $lahir->save();
        Session::flash('status', 'Ubah data Meninggal berhasil!!!');
        return redirect()->route('admin.lahir');
    }}

    public function getDataLahir($id)
    {
        $lahir = Lahir::find($id);
        return response()->json($lahir);
    }

    public function delete_Lahir($id)
    {
        $lahir = Lahir::find($id);
        Storage::delete('public/sbidan/'.$lahir->sbidan);
        Storage::delete('public/kk/'.$lahir->kk);
        Storage::delete('public/ktp/'.$lahir->ktp);
        $lahir->delete();
        $success = true;
        $message = "Data Meninggal Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
       
    }
    public function terima_lahir($id){
        $terima = DB::table('lahirs')->where('id', $id)->update(['approve' => 1, ]);
        Session::flash('status', 'Lahir Berhasil di Terima!!!');
        return redirect()->back();
    }
    public function tolak_lahir($id){
        $terima = DB::table('lahirs')->where('id', $id)->update([ 'approve' => 2,]);
        Session::flash('status', 'Lahir Berhasil di Tolak!!!');
        return redirect()->back();
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

    public function data_user(){
        $user = Auth::user();
        $pengguna = User::with('roles')->get();
        $roles = Roles::all();
        return view('admin.pengguna', compact('user','pengguna','roles'));
    }

    public function submit_user(Request $req){
        { $validate = $req->validate([
            'name'=> 'required',
            'username'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'roles_id'=> 'required',
        ]);
        
        $user = new User;
        $user->name = $req->get('name');
        $user->username = $req->get('username');
        $user->email = $req->get('email');
        $user->password = Hash::make($req->get('password'));
        $user->roles_id = $req->get('roles_id');
        $user->email_verified_at = null;
        $user->remember_token = null;
        if($req->hasFile('foto'))
        {
            $extension = $req->file('foto')->extension();
            $filename = 'foto'.time().'.'.$extension;
            $req->file('foto')->storeAS('public/foto', $filename);
            $user->foto = $filename;
        }
        if($req->hasFile('tandatangan'))
        {
            $extension = $req->file('tandatangan')->extension();
            $filename = 'tandatangan'.time().'.'.$extension;
            $req->file('tandatangan')->storeAS('public/tandatangan', $filename);
            $user->tandatangan = $filename;
        }
        $user->save();
        Session::flash('status', 'Tambah data User berhasil!!!');
        return redirect()->route('admin.pengguna');
    }}
    public function getDataUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function update_user(Request $req)
    { 
        $user= User::find($req->get('id'));
        { $validate = $req->validate([
            'username'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'roles_id'=> 'required',
        ]);
        $user->name = $req->get('name');
        $user->username = $req->get('username');
        $user->email = $req->get('email');
        $user->password = Hash::make($req->get('password'));
        $user->roles_id = $req->get('roles_id');
        $user->email_verified_at = null;
        $user->remember_token = null;
        if($req->hasFile('foto'))
        {
            $extension = $req->file('foto')->extension();
            $filename = 'foto'.time().'.'.$extension;
            $req->file('foto')->storeAS('public/foto', $filename);
            Storage::delete('public/foto/'.$req->get('old_foto'));
            $user->foto = $filename;
        }
        if($req->hasFile('tandatangan'))
        {
            $extension = $req->file('tandatangan')->extension();
            $filename = 'tandatangan'.time().'.'.$extension;
            $req->file('tandatangan')->storeAS('public/tandatangan', $filename);
            Storage::delete('public/tandatangan/'.$req->get('old_tandatangan'));
            $user->tandatangan = $filename;
        }
        $user->save();
        Session::flash('status', 'Ubah data User berhasil!!!');
        return redirect()->route('admin.pengguna');
    }
    }
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();

        $success = true;
        $message = "Data Pengguna Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function laporan()
    {
        $user = Auth::user();
        return view('admin.laporan', compact( 'user'));
    }
    public function print(Request $req){
        $validate = $req->validate([
            'dari_tanggal'=> 'required',
            'sampai_tanggal'=> 'required',
        ]);
        $user = Auth::user();
        if($req->get('status')=="Surat Pendatang"){
            $pendatang = Pendatang::where('approve',1)->whereBetween('created_at', [$req->get('dari_tanggal'),$req->get('sampai_tanggal')])->get();
            $tanggal = Carbon::now();
            $kondisi = $req->get('status');
            $profile1 = User::where('roles_id',1)->paginate(1);
            $profile = User::where('roles_id',2)->paginate(1);
            $pdf = PDF::loadview('print',['pendatang'=>$pendatang,'tanggal'=>$tanggal,'kondisi'=>$kondisi,'profile'=>$profile,'profile1'=>$profile1]);
            return $pdf->stream('laporan.pdf');
        }
        elseif($req->get('status')=="Surat Pindah"){
            $pindah = Pindah::where('approve',1)->whereBetween('created_at', [$req->get('dari_tanggal'),$req->get('sampai_tanggal')])->get();
            $tanggal = Carbon::now();
            $kondisi = $req->get('status');
            $profile1 = User::where('roles_id',1)->paginate(1);
            $profile = User::where('roles_id',2)->paginate(1);
            $pdf = PDF::loadview('print1',['pindah'=>$pindah,'tanggal'=>$tanggal,'kondisi'=>$kondisi,'profile'=>$profile,'profile1'=>$profile1]);
        return $pdf->stream('laporan.pdf');
        }
        elseif($req->get('status')=="Surat Kematian"){
            $meninggal = Meninggal::where('approve',1)->whereBetween('created_at', [$req->get('dari_tanggal'),$req->get('sampai_tanggal')])->get();
            $tanggal = Carbon::now();
            $kondisi = $req->get('status');
            $profile1 = User::where('roles_id',1)->paginate(1);
            $profile = User::where('roles_id',2)->paginate(1);
            $pdf = PDF::loadview('print2',['meninggal'=>$meninggal,'tanggal'=>$tanggal,'kondisi'=>$kondisi,'profile'=>$profile,'profile1'=>$profile1]);
            return $pdf->stream('laporan.pdf');
        }
        elseif($req->get('status')=="Surat Lahir"){
            $lahir = Lahir::where('approve',1)->whereBetween('created_at', [$req->get('dari_tanggal'),$req->get('sampai_tanggal')])->get();
            $tanggal = Carbon::now();
            $kondisi = $req->get('status');
            $profile1 = User::where('roles_id',1)->paginate(1);
            $profile = User::where('roles_id',2)->paginate(1);
            $pdf = PDF::loadview('print3',['lahir'=>$lahir,'tanggal'=>$tanggal,'kondisi'=>$kondisi, 'profile'=>$profile,'profile1'=>$profile1]);
            return $pdf->stream('laporan.pdf');
        }
       
        
    }
}
