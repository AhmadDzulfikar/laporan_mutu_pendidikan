<?php

namespace App\Http\Controllers;

use App\Models\Keluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Keluar::all();
        return view('keuangan.keluar')->with([
            'data' => $data
        ]);
    }

    public function cetak_pdf()
    {
        $data = Keluar::all();

        $pdf = PDF::loadview('pdf.keluar', ['data' => $data]);
        return $pdf->download('laporan-pengeluaran.pdf');
    }

    public function cetak_periode_pdf(Request $request)
    {
        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data = Keluar::whereBetween('tanggal', [$tgl1, $tgl2])->get();
        $keluar = Keluar::all();

        // dd($data);
        $pdf = PDF::loadview('periode.keluar', [
            'data' => $data,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'keluar' => $keluar,
        ]);
        return $pdf->download('laporan-rekap-periode-pengeluaran.pdf');
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
        $data = new Keluar();
        $result = preg_replace("/[^0-9]/", "", $request->keluar);
        $data->uraian = $request->uraian;
        $data->tanggal = $request->tanggal;
        $data->keluar = $result;

        $data->save();
        toast()->success('Berhasil', 'Berhasil Menambah Pengeluaran')->position('top');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Keluar $keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluar $keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Keluar::where('id', $id)->firstOrFail();

        // dd($request->all());
        $this->validate($request, [
            'uraian' => 'required',
            'tanggal' => 'required',
            'keluar' => 'required',
        ]);

        $result = preg_replace("/[^0-9]/", "", $request->keluar);
        $data->uraian = $request->uraian;
        $data->tanggal = $request->tanggal;
        $data->keluar = $result;
        $data->update();
        toast()->question('Berhasil', 'Berhasil Mengedit Pengeluaran')->position('top');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keluar::find($id);
        $data->delete();

        return redirect()->back();
    }
}
