<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Siswa;
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
        return response()->json([
            'data' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // gak butuh untuk sementara
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
            'kelas' => 'required'
        ]);

        $kelas = Kelas::create([
            'kelas' => $validation['kelas']
        ]);

        return response()->json([
            'message' => 'Data kelas berhasil disimpan',
            'data' => $kelas
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultKelas = Kelas::where('_id',$id)->get();
        $resultSiswa = Siswa::where('kelas_id', $id)->get(); 
        $response = [];
        foreach ($resultKelas as $k) {
            $response = [
                'id' => $k->_id, 
                'kelas' => $k->kelas,
                'siswa' => $resultSiswa
            ];
        }
        
        return response()->json(['data' => $response]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    // gak butuh untuk sementara 
    // public function edit(kelas $kelas)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = Kelas::find($id)->first();
        $result->kelas = $request->kelas;
        $result->save();

        return response()->json([
            'message' => 'Data kelas berhasil diubah',
            'data' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id)->first();

        $kelas->delete();

        return response()->json([
            'code' => '200',
            'message' => 'Data kelas berhasil dihapus',
            'data' => $kelas
        ]);
    }
}
