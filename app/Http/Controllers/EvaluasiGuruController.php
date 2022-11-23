<?php

namespace App\Http\Controllers;

use App\Models\EvaluasiGuru;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class EvaluasiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = EvaluasiGuru::all();
        return view('data.evaluasiguru')->with([
            'data' => $data
        ]);
    }
    // PDF
    public function cetak_pdf()
    {
        $data = EvaluasiGuru::all();

        $pdf = PDF::loadview('pdf.evaluasi', ['data' => $data]);
        return $pdf->download('laporan-informasi-pendidik.pdf');
    }

    public function cetak_periode_pdf(Request $request)
    {
        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data = EvaluasiGuru::whereBetween('tanggal', [$tgl1, $tgl2])->get();
        $evaluasi = EvaluasiGuru::all();

        // dd($data);
        $pdf = PDF::loadview('periode.evaluasi', [
            'data' => $data,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'evaluasi' => $evaluasi,
        ]);
        return $pdf->download('laporan-rekap-periode-informasi_guru.pdf');
    }
    // Tutup PDF

    public function store(Request $request)
    {
        if ($request->tanggal !== null && $request->nama !== null) {
            $data = new EvaluasiGuru();

            $data->tanggal = $request->tanggal;

            if ($request->nama === '0') {
                toast()->error('Gagal', 'Gagal Menambah Data Diri Pendidik')->position('top');
                return redirect()->back();
            } else {
                $data->nama = $request->nama;
            }

            if ($request->penghargaan === null) {
                $data->penghargaan = '-';
            } else {
                $data->penghargaan = $request->penghargaan;
            }

            if ($request->s1 === null) {
                $data->s1 = '-';
            } else {
                $data->s1 = $request->s1;
            }

            if ($request->s2 === null) {
                $data->s2 = '-';
            } else {
                $data->s2 = $request->s2;
            }

            if ($request->s3 === null) {
                $data->s3 = '-';
            } else {
                $data->s3 = $request->s3;
            }

            // $data->s1 = $request->s1;
            // $data->s2 = $request->s2;
            // $data->s3 = $request->s3;
            // $data->penghargaan = $request->penghargaan;

            $data->save();
            toast()->success('Berhasil', 'Berhasil Menambah Data Diri Pendidik')->position('top');
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvaluasiGuru  $evaluasiGuru
     * @return \Illuminate\Http\Response
     */
    public function show(EvaluasiGuru $evaluasiGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvaluasiGuru  $evaluasiGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(EvaluasiGuru $evaluasiGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EvaluasiGuru  $evaluasiGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = EvaluasiGuru::where('id', $id)->firstOrFail();

        // dd($request->all());
        $this->validate($request, [
            'tanggal' => 'required',
            'nama' => 'required',
            'penghargaan' => 'required',
        ]);

        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->s1 = $request->s1;
        $data->s2 = $request->s2;
        $data->s3 = $request->s3;
        $data->penghargaan = $request->penghargaan;
        $data->update();
        toast()->success('Berhasil', 'Berhasil Mengedit Data Diri Pendidik')->position('top');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvaluasiGuru  $evaluasiGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = EvaluasiGuru::find($id);
        $data->delete();
        toast()->success('Berhasil', 'Berhasil Menghapus Data Diri Pendidik')->position('top');

        return redirect()->back();
    }
}
