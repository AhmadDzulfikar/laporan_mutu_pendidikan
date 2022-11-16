<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\PesertaDidik;
use App\Models\Prasarana;
use App\Models\User;
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
        
        $prasarana = Prasarana::where('kondisi','rusak')->get();
        
        // $data_month_un_p[(int) $bulan_in_p] = Masuk::all(); 

        $rusak = $prasarana->sum('jumlah');
        $data = $data->count('siswa');
                return view('dashboard.index',compact('user','data','rusak'));
        
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
