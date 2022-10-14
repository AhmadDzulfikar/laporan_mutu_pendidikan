<?php

namespace App\Http\Controllers;

use App\Models\Baik;
use Illuminate\Http\Request;

class BaikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Baik::all();
        return view('prasarana.baik')->with([
            'data'=> $data
        ]);
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

        $data = new Baik();
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->tanggal = $request->tanggal;

        $data->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baik  $baik
     * @return \Illuminate\Http\Response
     */
    public function show(Baik $baik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baik  $baik
     * @return \Illuminate\Http\Response
     */
    public function edit(Baik $baik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baik  $baik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Baik::where('id', $id)->firstOrFail();

        // dd($request->all());
        $this->validate($request , [
            'nama'=>'required',
            'jumlah'=>'required',
            'tanggal'=>'required',
        ]);

        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->tanggal = $request->tanggal;
        $data->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baik  $baik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Baik::find($id);
        $data->delete();
        
        return redirect()->back();
    }
}
