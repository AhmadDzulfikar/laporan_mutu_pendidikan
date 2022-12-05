<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class PesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PesertaDidik::all();
        foreach ($data as $datas) {
            $datas->masuk = Masuk::where('pesertadidik_id', $datas->id)->first();
        }

        return view('data.pesertadidik')->with([
            'data' => $data
        ]);
    }

    public function cetak_pdf()
    {
        $data = PesertaDidik::all();

        $pdf = PDF::loadview('pdf.pesertadidik', ['data' => $data]);
        return $pdf->download('laporan-pegawai.pdf');
    }

    public function cetak_periode_pdf(Request $request)
    {
        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data = PesertaDidik::whereBetween('created_at', [$tgl1, $tgl2])->get();
        $pesertadidik = PesertaDidik::all();

        // dd($data);
        $pdf = PDF::loadview('periode.pesertadidik', [
            'data' => $data,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'pesertadidik' => $pesertadidik,
        ]);
        return $pdf->download('laporan-rekap-periode-pesertadidik.pdf');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'siswa' => 'required',
            'nisn' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'no_tlp' => 'required',
            'org_tua' => 'required',
            'tgl_msk' => 'required',
            'tgl_lulus',
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Menambah Peserta Didik')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Menambah Peserta Didik')->position('top');
        }
        $data = new PesertaDidik();

        if ($request->tgl_lulus === null) {
            $data->tgl_lulus = null ;
        } else {
            $data->tgl_lulus = $request->tgl_lulus;
        }

        $data->siswa = $request->siswa;
        $data->nisn = $request->nisn;
        $data->tempat = $request->tempat;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->no_tlp = $request->no_tlp;
        $data->org_tua = $request->org_tua;
        $data->tgl_msk = $request->tgl_msk;

        $data->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'siswa' => 'required',
            'nisn' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'no_tlp' => 'required',
            'org_tua' => 'required',
            'tgl_msk' => 'required',
            'tgl_lulus' => 'required'
        ]);
        if ($validator->fails()) {
            toast()->error('Gagal', 'Gagal Menambah Prestasi Pendidik')->position('top');
            return redirect()->back();
        } else {
            toast()->success('Berhasil', 'Berhasil Menambah Pengeluaran')->position('top');
        }
        $data = PesertaDidik::where('id', $id)->firstOrFail();

        $data->siswa = $request->siswa;
        $data->nisn = $request->nisn;
        $data->tempat = $request->tempat;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->no_tlp = $request->no_tlp;
        $data->org_tua = $request->org_tua;
        $data->tgl_msk = $request->tgl_msk;
        $data->tgl_lulus = $request->tgl_lulus;
        $data->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PesertaDidik::find($id);
        $data->delete();
        toast()->success('Berhasil', 'Berhasil Menghapus Pesertadidik')->position('top');

        return redirect()->back();
    }
}
