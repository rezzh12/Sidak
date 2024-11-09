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
class KepalaController extends Controller
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
        return view('kepala.Dashboard', compact('user','pendatang','pindah','lahir','meninggal'));
    }

    public function grafik()
    {
        $datang = Pendatang::select(DB::raw("COUNT(*) as count"))->whereYear("created_at",date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $pindah = Pindah::select(DB::raw("COUNT(*) as count"))->whereYear("created_at",date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $lahir = Lahir::select(DB::raw("COUNT(*) as count"))->whereYear("created_at",date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $meninggal = Meninggal::select(DB::raw("COUNT(*) as count"))->whereYear("created_at",date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $user = Auth::user();
        return view('kepala.grafik', compact( 'user','datang','pindah','lahir','meninggal'));
    }

    public function riwayat()
    {
        $datang = Pendatang::all();
        $pindah = Pindah::all();
        $lahir = Lahir::all();
        $meninggal = Meninggal::all();
        $user = Auth::user();
        return view('kepala.riwayat', compact( 'user','datang','pindah','lahir','meninggal'));
    }
    public function pendatang(){
        $user = Auth::user();
        $pendatang = Pendatang::all();
        return view('kepala.pendatang', compact('user','pendatang'));
    }
    public function pindah(){
        $user = Auth::user();
        $pindah = Pindah::all();
        return view('kepala.pindah', compact('user','pindah'));
    }
    public function meninggal(){
        $user = Auth::user();
        $meninggal = Meninggal::all();
        return view('kepala.meninggal', compact('user','meninggal'));
    }
    public function lahir(){
        $user = Auth::user();
        $lahir = Lahir::all();
        return view('kepala.lahir', compact('user','lahir'));
    }
    public function laporan()
    {
        $user = Auth::user();
        return view('kepala.laporan', compact( 'user'));
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
