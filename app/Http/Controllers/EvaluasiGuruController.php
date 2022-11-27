<?php

namespace App\Http\Controllers;

use App\Models\EvaluasiGuru;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class EvaluasiGuruController extends Controller
{
    // INDEX
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
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'nama' => 'required',
            's1',
            's2',
            's3',
            'penghargaan',
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Menambah Informasi Pendidik')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Menambah Informasi Pendidik')->position('top');
        }
        $data = new EvaluasiGuru();

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

        if ($request->penghargaan === null) {
            $data->penghargaan = '-';
        } else {
            $data->penghargaan = $request->penghargaan;
        }

        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;

        $data->save();

        return redirect()->back();
    }

// UPDATE DATA
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'nama' => 'required',
            's1',
            's2',
            's3',
            'penghargaan',
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Mengedit Prestasi Pendidik')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Mengedit Pengeluaran')->position('top');
        }
        $data = EvaluasiGuru::where('id', $id)->firstOrFail();

        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->s1 = $request->s1;
        $data->s2 = $request->s2;
        $data->s3 = $request->s3;
        $data->penghargaan = $request->penghargaan;
        $data->update();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = EvaluasiGuru::find($id);
        $data->delete();
        toast()->success('Berhasil', 'Berhasil Menghapus Data Diri Pendidik')->position('top');

        return redirect()->back();
    }
}
