<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\PesertaDidik;
use App\Models\Prasarana;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //view
    public function index()
    {
        $user = User::all();
        $data = PesertaDidik::all();    
        $masuk = Masuk::all();
        $keluar = Keluar::all();
        // dd($keluar)
        
        $prasarana = Prasarana::where('kondisi','rusak')->get();
        
        // $data_month_un_p[(int) $bulan_in_p] = Masuk::all(); 

        $this_year = Carbon::now()->format('Y');
                $month_p = Masuk::where('tanggal','like', $this_year.'%')->get();
                $month_k = Keluar::where('tanggal','like', $this_year.'%')->get();

                for ($i=1; $i <= 12; $i++){
                    $data_month_p[(int)$i]=0;
                    $data_month_k[(int)$i]=0;    

                }
        
                foreach ($month_p as $a) {
                    $bulan_p= explode('-',carbon::parse($a->tanggal)->format('Y-m-d'))[1];
                    // dd($bulan_p);
                        $data_month_p[(int) $bulan_p]+= $a->uangpangkal + $a->uangkegiatan + $a->spp + $a->uangperlengkapan; 
                }
                foreach ($month_k as $b) {
                    $bulan_k= explode('-',carbon::parse($b->tanggal)->format('Y-m-d'))[1];
                    // dd($bulan_k);
                        $data_month_k[(int) $bulan_k]+= $b->keluar; 
                }

        $rusak = $prasarana->sum('jumlah');
        $data = $data->count('siswa');

        $pangkal = Masuk::sum('uangpangkal');
        $spp = Masuk::sum('spp');
        $kegiatan = Masuk::sum('uangkegiatan');
        $perlengkapan = Masuk::sum('uangperlengkapan');

        $total_in = $pangkal + $spp + $kegiatan + $perlengkapan;
        $total_out = Keluar::sum('keluar');
        // dd($total_out);

                return view('dashboard.index',compact('user','data','rusak', 'total_out','total_in'))
                -> with('data_month_p', $data_month_p)
                -> with('data_month_k', $data_month_k);
    }

    //edit user
    public function editUser(Request $request, $id)
    {
        $data = User::where('id', $id)->firstOrFail();

        $request->validate([
            'gambar' => 'file|max:3072',
            'email',
            'name',

        ]);

        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->gambar) {

            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/user', $filename);
            }
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }
        // dd($data);
        $data->update();

        return redirect()->back();
    }
}
