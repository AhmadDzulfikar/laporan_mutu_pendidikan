<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

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
        if (
            $request->nisn !== null && $request->siswa !== null
            && $request->tempat !== null && $request->tgl_lahir !== null
            && $request->no_tlp !== null
            && $request->org_tua !== null
            && $request->tgl_msk !== null
        ) {
            $data = new PesertaDidik();

            $data->nisn = $request->nisn;
            $data->tempat = $request->tempat;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->no_tlp = $request->no_tlp;
            $data->org_tua = $request->org_tua;
            $data->tgl_msk = $request->tgl_msk;
            $data->tgl_lulus = $request->tgl_lulus;

            if ($request->siswa === null) {
                toast()->error('Gagal', 'Gagal Menambah Prestasi Pendidik')->position('top');
                return redirect()->back();
            } else {
                $data->siswa = $request->siswa;
            }

            $data->save();
            toast()->success('Berhasil', 'Berhasil Menambah Pesertadidik')->position('top');
            return redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PesertaDidik::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'siswa' => 'required',
            'nisn' => 'required',
            'tempat' => 'required',
            'tgl_lahir' => 'required',
            'no_tlp' => 'required',
            'org_tua' => 'required',
            'tgl_msk' => 'required',
            'tgl_lulus' => 'required'
        ]);

        $data->siswa = $request->siswa;
        $data->nisn = $request->nisn;
        $data->tempat = $request->tempat;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->no_tlp = $request->no_tlp;
        $data->org_tua = $request->org_tua;
        $data->tgl_msk = $request->tgl_msk;
        $data->tgl_lulus = $request->tgl_lulus;
        $data->update();
        toast()->success('Berhasil', 'Berhasil Mengedit Pesertadidik')->position('top');

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
