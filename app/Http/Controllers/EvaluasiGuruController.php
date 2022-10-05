<?php

namespace App\Http\Controllers;

use App\Models\EvaluasiGuru;
use Illuminate\Http\Request;

class EvaluasiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.evaluasiguru');
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
    public function update(Request $request, EvaluasiGuru $evaluasiGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvaluasiGuru  $evaluasiGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvaluasiGuru $evaluasiGuru)
    {
        //
    }
}
