<?php

namespace App\Http\Controllers;

use App\Models\PrestasiGuru;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrestasiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PrestasiGuru::all();
        return view('data.prestasiguru')->with([
            'data' => $data
        ]);
    }

    public function cetak_pdf()
    {
        $data = PrestasiGuru::all();

        $pdf = PDF::loadview('pdf.prestasiguru', ['data' => $data]);
        return $pdf->download('laporan-prestasi-guru.pdf');
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
        $data = new PrestasiGuru();

        $data->nama = $request->nama;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;

        $data->save();
        toast()->success('Berhasil', 'Berhasil Menambah Prestasi Pendidik')->position('top');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrestasiGuru  $prestasiGuru
     * @return \Illuminate\Http\Response
     */
    public function show(PrestasiGuru $prestasiGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrestasiGuru  $prestasiGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(PrestasiGuru $prestasiGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrestasiGuru  $prestasiGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PrestasiGuru::where('id', $id)->firstOrFail();

        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        $data->nama = $request->nama;
        $data->tanggal = $request->tanggal;
        $data->keterangan = $request->keterangan;
        $data->update();
        toast()->success('Berhasil', 'Berhasil Mengedit Prestasi Pendidik')->position('top');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestasiGuru  $prestasiGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PrestasiGuru::find($id);
        $data->delete();
        toast()->success('Berhasil','Berhasil Menghapus Data Prestasi Guru')->position('top');
        
        return redirect()->back();
    }
}
