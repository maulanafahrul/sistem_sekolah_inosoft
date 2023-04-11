<?php

namespace App\Http\Controllers;

use App\Models\mata_pelajaran;
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
        $mata_Pelajarans = Mata_Pelajaran::all();

        return response()->json($mata_Pelajarans);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string'
        ]);

        $mata_Pelajaran = new Mata_Pelajaran([
            'nama' => $validatedData['nama']
        ]);

        $mata_Pelajaran->save();

        return response()->json([
            'message' => 'Mata Pelajaran berhasil dibuat',
            'data' => $mata_Pelajaran
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mata_Pelajaran = Mata_Pelajaran::with('siswas')->findOrFail($id);

        return response()->json($mata_Pelajaran);
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
        $validatedData = $request->validate([
            'nama' => 'required|string'
        ]);

        $mataPelajaran = Mata_Pelajaran::findOrFail($id);

        $mataPelajaran->nama = $validatedData['nama'];

        $mataPelajaran->save();

        return response()->json([
            'message' => 'Mata Pelajaran berhasil diupdate',
            'data' => $mataPelajaran
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = mata_pelajaran::find($id);

        $siswa->delete();

        return response()->json([
            'message' => 'mata pelajaran berhasil dihapus'
        ]);
    }
}
