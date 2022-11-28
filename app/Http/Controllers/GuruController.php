<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = User::orderBy('name', 'ASC')->role('guru')->get();
        return view('user.guru',compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "gambar",
            "name" => 'required',
            "email" => 'required',
            "password" => 'required|min:8'
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Menambah Guru')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Menambah Guru')->position('top');
        }

        $data = new User();
        $data->gambar = $request->gambar;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->assignRole('guru');
        if($request->gambar){
            $img = $request->file('gambar');
            $filename = $img->getClientOriginalName();

            if ($request->hasFile('gambar')) {
                $request->file('gambar')->storeAs('/user',$filename);
            }
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }

        $data->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        toast()->success('Berhasil','Berhasil Menghapus Guru')->position('top');
        
        return redirect()->back();
    }
}
