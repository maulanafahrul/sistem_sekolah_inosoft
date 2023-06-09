<?php

namespace App\Http\Controllers;

use App\Models\Mata_pelajaran;
use App\Models\Nilai;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all();

        return response()->json([
            'data' => $nilai
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

        $nilai = Nilai::create([
            'siswa_id' => $request->siswa_id,
            'pelajaran_id' => $request->pelajaran_id,
            'latihan_1' => $request->latihan_1,
            'latihan_2' => $request->latihan_2,
            'latihan_3' => $request->latihan_3,
            'latihan_4' => $request->latihan_4,
            'ulangan_harian_1' => $request->ulangan_harian_1,
            'ulangan_harian_2' => $request->ulangan_harian_2,
            'ulangan_tengah_semester' => $request->ulangan_tengah_semester,
            'ulangan_semester' => $request->ulangan_semester,
        ]);

        return response()->json(['data' => $nilai]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Nilai::where('pelajaran_id',$id)->get();
        return response()->json(['data' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    // public function edit(Nilai $nilai)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mata_pelajaran = Mata_pelajaran::find($id)->get();
        $nilai = Nilai::where('pelajaran_id',$id)->first();

        $mata_pelajaran->mata_pelajaran = $request->pelajaran;
            $nilai->siswa_id = $request->siswa_id;
            $nilai->pelajaran_id = $request->pelajaran_id;
            $nilai->latihan_1 = $request->latihan_1;
            $nilai->latihan_2 = $request->latihan_2;
            $nilai->latihan_3 = $request->latihan_3;
            $nilai->latihan_4 = $request->latihan_4;
            $nilai->ulangan_harian_1 = $request->ulangan_harian_1;
            $nilai->ulangan_harian_2 = $request->ulangan_harian_2;
            $nilai->ulangan_tengah_semester = $request->ulangan_tengah_semester;
            $nilai->ulangan_semester = $request->ulangan_semeseter;
            $nilai->save();

            return response()->json([
                'code' => '200',
                'message' => 'Data nilai siswa berhasil diubah',
                'data' => $nilai
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::find($id)->first();

        $nilai->delete();

        return response()->json([
            'code' => '200',
            'message' => 'Data nilai siswa berhasil dihapus',
            'data' => $nilai
        ]);
    }
}
