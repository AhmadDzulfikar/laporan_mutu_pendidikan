<?php

namespace App\Http\Controllers;

use App\Models\Baik;
use App\Models\Rusak;
use Illuminate\Http\Request;

class RusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baik = Baik::with('rusaks')->get();
        return view('prasarana.rusak',compact('baik'));
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
        // $data = $request->except(['_token']);
        // Prasarana::create($data);
        // // dd($data);
        // return redirect('/store-prasarana');

        $data = Rusak::create([
            "jumlah_r" => $request->jumlah_r,
            "tanggal" => $request->tanggal,
            "baik_id" => $request->baik_id
        ]);

        return redirect()->back();
    }


}
