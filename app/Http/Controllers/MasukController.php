<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use App\Models\Keluar;
use App\Models\Masuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;


class MasukController extends Controller
{
    public function index()
    {
        $masuk = Masuk::all();
        $siswa = PesertaDidik::all();
        return view('keuangan.masuk', compact('masuk', 'siswa'));
    }

    public function cetak_periode_pdf(Request $request)
    {
        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $masuk = Masuk::whereBetween('tanggal', [$tgl1, $tgl2])->get();
        $siswa = PesertaDidik::all();
        $pemasukkan = Masuk::all();

        // dd($data);
        $pdf = PDF::loadview('periode.pemasukkan', [
            'masuk' => $masuk,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'pemasukkan' => $pemasukkan,
            'siswa' => $siswa,
        ]);
        return $pdf->download('laporan-rekap-periode-pemasukkan.pdf');
    }

    public function cetak_pdf()
    {
        $masuk = Masuk::all();

        $pdf = PDF::loadview('pdf.pemasukkan', ['masuk' => $masuk]);
        return $pdf->download('laporan-pemasukkan.pdf');
    }

    public function store(Request $request)
    {
        // if ($request->tanggal !== null && $request->pesertadidik_id !== null) {
        //     $data = new Masuk();

        //     $result = preg_replace("/[^0-9]/", "", $request->masuk);

        //     $data->tanggal = $request->tanggal;
        //     $data->uangpangkal = preg_replace("/[^0-9]/", "", $request->uangpangkal);
        //     $data->spp = preg_replace("/[^0-9]/", "", $request->spp);
        //     $data->uangkegiatan = preg_replace("/[^0-9]/", "", $request->uangkegiatan);
        //     $data->uangperlengkapan = preg_replace("/[^0-9]/", "", $request->uangperlengkapan);

        //     if ($request->pesertadidik_id === '0') {
        //         toast()->error('Gagal', 'Gagal Menambah Pemasukkan')->position('top');
        //         return redirect()->back();
        //     } else {
        //         $data->pesertadidik_id = $request->pesertadidik_id;
        //     }
        //     $data->save();
        //     toast()->success('Berhasil', 'Berhasil Menambah Pemasukkan')->position('top');
        //     return redirect()->back();
        // }
        // // dd($data->uangperlengkapan);
        // return redirect()->back();

        $validator = Validator::make($request->all(), [
            'pesertadidik_id' => 'required',
            'tanggal' => 'required',
            'uangpangkal',
            'spp',
            'uangkegiatan',
            'uangperlengkapan',
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Menambah Prestasi Pendidik')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Menambah Pengeluaran')->position('top');
        }
        $data = new Masuk();

        $data->pesertadidik_id = $request->pesertadidik_id;
        $data->tanggal = $request->tanggal;
        $data->uangpangkal = preg_replace("/[^0-9]/", "", $request->uangpangkal);
        $data->spp = preg_replace("/[^0-9]/", "", $request->spp);
        $data->uangkegiatan = preg_replace("/[^0-9]/", "", $request->uangkegiatan);
        $data->uangperlengkapan = preg_replace("/[^0-9]/", "", $request->uangperlengkapan);

        $data->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pesertadidik_id' => 'required',
            'tanggal' => 'required',
            'uangpangkal',
            'spp',
            'uangkegiatan',
            'uangperlengkapan',
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Menambah Prestasi Pendidik')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Menambah Pengeluaran')->position('top');
        }
        $data = Masuk::where('id', $id)->firstOrFail();

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

        toast()->success('Berhasil', 'Berhasil Menghapus Pemasukkan')->position('top');
        return redirect()->back();
    }
}
