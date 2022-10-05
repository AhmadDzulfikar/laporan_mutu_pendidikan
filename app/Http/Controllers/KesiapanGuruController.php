<?php

namespace App\Http\Controllers;

use App\Models\KesiapanGuru;
use Illuminate\Http\Request;

class KesiapanGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.kesiapanguru');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KesiapanGuru  $kesiapanGuru
     * @return \Illuminate\Http\Response
     */
    public function show(KesiapanGuru $kesiapanGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KesiapanGuru  $kesiapanGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(KesiapanGuru $kesiapanGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KesiapanGuru  $kesiapanGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KesiapanGuru $kesiapanGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KesiapanGuru  $kesiapanGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(KesiapanGuru $kesiapanGuru)
    {
        //
    }
}
