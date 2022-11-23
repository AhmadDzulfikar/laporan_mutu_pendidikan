<?php

namespace App\Http\Controllers;

use App\Models\PesertaDidik;
use App\Models\Keluar;
use App\Models\Masuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masuk = Masuk::get();
        $siswa = PesertaDidik::all();
        return view('keuangan.masuk', compact('masuk', 'siswa'));
    }

    public function cetak_pdf()
    {
        $masuk = Masuk::all();

        $pdf = PDF::loadview('pdf.pemasukkan', ['masuk' => $masuk]);
        return $pdf->download('laporan-pemasukkan.pdf');
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
        if ($request->tanggal !== null && $request->pesertadidik_id !== null) {
            $data = new Masuk();

            $result = preg_replace("/[^0-9]/", "", $request->masuk);

            $data->tanggal = $request->tanggal;
            $data->uangpangkal = preg_replace("/[^0-9]/", "", $request->uangpangkal);
            $data->spp = preg_replace("/[^0-9]/", "", $request->spp);
            $data->uangkegiatan = preg_replace("/[^0-9]/", "", $request->uangkegiatan);
            $data->uangperlengkapan = preg_replace("/[^0-9]/", "", $request->uangperlengkapan);

            if ($request->pesertadidik_id === '0') {
                toast()->error('Gagal', 'Gagal Menambah Pemasukkan')->position('top');
                return redirect()->back();
            } else {
                $data->pesertadidik_id = $request->pesertadidik_id;
            }
            $data->save();
            toast()->success('Berhasil', 'Berhasil Menambah Pemasukkan')->position('top');
            return redirect()->back();
        }
        // dd($data->uangperlengkapan);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Masuk $masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Masuk $masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Masuk::where('id', $id)->firstOrFail();

        // dd($request->all());
        $this->validate($request, [
            'pesertadidik_id' => 'required',
            'tanggal' => 'required',
            'uangpangkal' => 'required',
            'spp' => 'required',
            'uangkegiatan' => 'required',
            'uangperlengkapan' => 'required',
        ]);

        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $data->pesertadidik_id = $request->pesertadidik_id;
        $data->tanggal = $request->tanggal;
        $data->uangpangkal = preg_replace("/[^0-9]/", "", $request->uangpangkal);
        $data->spp = preg_replace("/[^0-9]/", "", $request->spp);
        $data->uangkegiatan = preg_replace("/[^0-9]/", "", $request->uangkegiatan);
        $data->uangperlengkapan = preg_replace("/[^0-9]/", "", $request->uangperlengkapan);
        $data->update();
        toast()->success('Berhasil', 'Berhasil Mengedit Pemasukkan')->position('top');
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
