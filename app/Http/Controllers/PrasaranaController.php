<?php

namespace App\Http\Controllers;

use App\Models\Prasarana;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class PrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Prasarana::all();
        return view('prasarana')->with([
            'data' => $data
        ]);
    }

    public function cetak_pdf()
    {
        $data = Prasarana::all();

        $pdf = PDF::loadview('pdf.prasarana', ['data' => $data]);
        return $pdf->download('laporan-prasarana-guru.pdf');
    }

    public function cetak_periode_pdf(Request $request)
    {
        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data = Prasarana::whereBetween('tanggal', [$tgl1, $tgl2])->get();
        $prasarana = Prasarana::all();

        // dd($data);
        $pdf = PDF::loadview('periode.prasarana', [
            'data' => $data,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'prasarana' => $prasarana,
        ]);
        return $pdf->download('laporan-rekap-periode-prasarana.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('create_prasarana');
    // }

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

        $data = new Prasarana();
        $data->uraian = $request->uraian;
        $data->jumlah = $request->jumlah;
        $data->tanggal = $request->tanggal;
        $data->kondisi = $request->kondisi;

        $data->save();
        toast()->success('Berhasil', 'Berhasil Menambah Sarana Prasarana')->position('top');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prasarana  $prasarana
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = Prasarana::findOrFail($id);
        // return view('prasarana')->with([
        //     'data'=> $data
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prasarana  $prasarana
     * @return \Illuminate\Http\Response
     */
    public function edit(Prasarana $prasarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prasarana  $prasarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Prasarana::where('id', $id)->firstOrFail();

        // dd($request->all());
        $this->validate($request, [
            'uraian' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required'
        ]);

        $data->uraian = $request->uraian;
        $data->jumlah = $request->jumlah;
        $data->tanggal = $request->tanggal;
        $data->kondisi = $request->kondisi;
        $data->update();
        toast()->success('Berhasil', 'Berhasil Mengedit Sarana Prasarana')->position('top');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prasarana  $prasarana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Prasarana::find($id);
        $data->delete();
        toast()->success('Berhasil', 'Berhasil Menghapus Sarana Prasarana')->position('top');

        return redirect()->back();
    }
}
