<?php

namespace App\Http\Controllers;

use App\Models\EvaluasiGuru;
use App\Models\PrestasiGuru;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

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
        $nama = EvaluasiGuru::all();
        return view('data.prestasiguru', compact('data', 'nama'));
    }

    public function cetak_periode_pdf(Request $request)
    {
        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data = PrestasiGuru::whereBetween('tanggal', [$tgl1, $tgl2])->get();
        $nama = EvaluasiGuru::all();
        $prestasi = PrestasiGuru::all();

        // dd($data);
        $pdf = PDF::loadview('periode.prestasiguru', [
            'data' => $data,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'prestasi' => $prestasi,
            'nama' => $nama,
        ]);
        return $pdf->download('laporan-rekap-periode-prestasiguru.pdf');
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

        if ($request->tanggal !== null && $request->evaluasi_guru_id !== null) {

            $data = new PrestasiGuru();

            $data->tanggal = $request->tanggal;

            if ($request->evaluasi_guru_id === '0') {
                toast()->error('Gagal', 'Gagal Menambah Prestasi Pendidik')->position('top');
                return redirect()->back();
            } else {
                $data->evaluasi_guru_id = $request->evaluasi_guru_id;
            }

            if ($request->keterangan === null) {
                $data->keterangan = '-';
            } else {
                $data->keterangan = $request->keterangan;
            }
            // dd($data);
            $data->save();
            toast()->success('Berhasil', 'Berhasil Menambah Prestasi Pendidik')->position('top');
            return redirect()->back();
        }
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
        if ($request->tanggal !== null && $request->evaluasi_guru_id !== null && $request->keterangan !== null) {

            $data = PrestasiGuru::where('id', $id)->firstOrFail();

            // dd($request->all());

            $data = PrestasiGuru::find($id)->update([
                'evaluasi_guru_id' => $request->evaluasi_guru_id,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan
            ]);

            toast()->success('Berhasil', 'Berhasil Mengedit Prestasi Pendidik')->position('top');

            return redirect()->back();
        } else {
            toast()->error('Gagal', 'Gagal Mengedit Prestasi Pendidik')->position('top');

            return redirect()->back();
        }
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
        toast()->success('Berhasil', 'Berhasil Menghapus Data Prestasi Guru')->position('top');

        return redirect()->back();
    }
}
