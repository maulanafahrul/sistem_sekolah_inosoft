<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();

        return response()->json($siswa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new Siswa;

        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->kelas = $request->kelas;
        $siswa->tgl_lahir = $request->tgl_lahir;

        $siswa->save();

        return response()->json([
            'message' => 'Siswa berhasil ditambahkan',
            'siswa' => $siswa
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);

        return response()->json($siswa);
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
        $siswa = Siswa::find($id);

        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->kelas = $request->kelas;
        $siswa->tgl_lahir = $request->tgl_lahir;

        $siswa->save();

        return response()->json([
            'message' => 'Siswa berhasil diupdate',
            'siswa' => $siswa
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
        $siswa = Siswa::find($id);

        $siswa->delete();

        return response()->json([
            'message' => 'Siswa berhasil dihapus'
        ]);
    }
}
