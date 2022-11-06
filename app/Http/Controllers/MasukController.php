<?php

namespace App\Http\Controllers;
use App\Models\PesertaDidik;
use App\Models\Keluar;
use App\Models\Masuk;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masuk = Masuk::get();
        $siswa = PesertaDidik::all();
        return view('keuangan.masuk',compact('masuk','siswa'));
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
        $data = new Masuk();
        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $data->pesertadidik_id = $request->pesertadidik_id;
        $data->tanggal = $request->tanggal;
        $data->uangpangkal = preg_replace("/[^0-9]/", "", $request->uangpangkal);
        $data->spp = preg_replace("/[^0-9]/", "", $request->spp);
        $data->uangkegiatan = preg_replace("/[^0-9]/", "", $request->uangkegiatan);
        $data->uangperlengkapan = preg_replace("/[^0-9]/", "", $request->uangperlengkapan);
        // dd($data->uangperlengkapan);
        $data->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Masuk $masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Masuk $masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Masuk::where('id', $id)->firstOrFail();

        // dd($request->all());
        $this->validate($request , [
            'pesertadidik_id'=>'required',
            'tanggal'=>'required',
            'uangpangkal'=>'required',
            'spp'=>'required',
            'uangkegiatan'=>'required',
            'uangperlengkapan'=>'required',
        ]);

        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $data->pesertadidik_id = $request->pesertadidik_id;
        $data->tanggal = $request->tanggal;
        $data->uangpangkal = preg_replace("/[^0-9]/", "", $request->uangpangkal);
        $data->spp = preg_replace("/[^0-9]/", "", $request->spp);
        $data->uangkegiatan = preg_replace("/[^0-9]/", "", $request->uangkegiatan);
        $data->uangperlengkapan = preg_replace("/[^0-9]/", "", $request->uangperlengkapan);
        $data->update();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masuk = Masuk::find($id);
        $masuk->delete();

        return redirect()->back();
    }
}
