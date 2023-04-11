<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();

        return response()->json($kelas);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas;

        $kelas->nama = $request->nama;

        $kelas->save();

        return response()->json([
            'message' => 'Kelas berhasil ditambahkan',
            'kelas' => $kelas
        ]);
    }

    public function show($id)
    {
        $kelas = kelas::find($id);

        return response()->json($kelas);
    }

}
