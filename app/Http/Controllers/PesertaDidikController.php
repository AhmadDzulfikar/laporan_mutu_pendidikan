<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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
            'data'=> $data
        ]);
    }

    public function cetak_pdf()
    {
        $data = PesertaDidik::all();

        $pdf = PDF::loadview('pdf.pesertadidik', ['data' => $data]);
        return $pdf->download('laporan-pegawai.pdf');
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
        $data = new PesertaDidik();
        $data->siswa = $request->siswa;
        $data->nisn = $request->nisn;
        $data->tempat = $request->tempat;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->no_tlp = $request->no_tlp;
        $data->org_tua = $request->org_tua;
        $data->tgl_msk = $request->tgl_msk;
        $data->tgl_lulus = $request->tgl_lulus;
        //  
        $data->save();

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

        return redirect()->back();
    }
}
