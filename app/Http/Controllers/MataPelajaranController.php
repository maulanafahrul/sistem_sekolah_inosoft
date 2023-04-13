<?php

namespace App\Http\Controllers;

use App\Models\Mata_pelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mata_pelajaran = mata_pelajaran::all();
        return response()->json([
            'data' => $mata_pelajaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            
        ]);
    }

    /**
     * Display the specified resource.
     *

     * @param  \App\Models\Mata_pelajaran  $mata_pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Mata_pelajaran $mata_pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mata_pelajaran  $mata_pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Mata_pelajaran $mata_pelajaran)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\Mata_pelajaran  $mata_pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mata_pelajaran $mata_pelajaran)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *

     * @param  \App\Models\Mata_pelajaran  $mata_pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mata_pelajaran $mata_pelajaran)
    {
        //
    }
}
