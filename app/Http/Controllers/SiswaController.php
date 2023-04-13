<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
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

        return response()->json([
            'data' => $siswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation =  $request->validate([
            'nama' => 'required',
            'nisn' => 'required'
        ]);

        $siswa = Siswa::create([
            'nama' => $validation['nama'],
            'nisn' => $validation['nisn'],
            'kelas_id' => $request->kelas_id
        ]);

        return response()->json([
            'message' => 'Siswa berhasil ditambahkan',
            'data' => $siswa
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
        $siswa = Siswa::where('_id',$id)->get();
        $nilai2 = [];
        $nilai = Nilai::where('siswa_id',$id)->get();
        foreach ($siswa as $s) {
            foreach ($nilai as $n) {
                $nama    = $n->mata_pelajaran_id->mata_pelajaran_id;
                $latihan = 0.15 * (($n->latihan_1+$n->latihan_2+$n->latihan_3+$n->latihan_4) / 4);
                $harian  = 0.2 * (($n->ulangan_harian_1+$n->ulangan_harian_2) / 2);
                $uts     = 0.25 * $n->ulangan_tengah_semester;
                $uas     = 0.4 * $n->ulangan_semester;
                $hasil   = $latihan+$harian+$uts+$uas;

                $nilai1  = [
                    'pelajaran_id' => $n->id,
                    'pelajaran' => $nama,
                    'nilai_total' => $hasil
                ];

                array_push($nilai2, $nilai1);
            }
            $response = [
                'id' => $s->_id,
                'nama' => $s->nama,
                'kelas_id' => $s->kelas_id,
                'nilai' => $nilai2
            ];
        }
        return response()->json([
            'message' => 'Siswa berhasil ditambahkan',
            'data' => $response
        ]);
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
        $siswa = Siswa::find($id)->first();

        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->kelas_id = $request->kelas_id;
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
        $siswa = Siswa::find($id)->first();

        $siswa->delete();

        return response()->json([
            'message' => 'Siswa berhasil dihapus'
        ]);
    }
}
