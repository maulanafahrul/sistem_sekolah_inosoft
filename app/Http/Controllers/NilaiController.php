<?php

namespace App\Http\Controllers;
use App\Models\kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mata_Pelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, siswa $id)
    {
        $siswa = siswa::find($id);
    if ($siswa) {
        $kelas = kelas::find($siswa->kelas_id);
        if ($kelas) {
            $nilaiLatihan = collect($siswa->nilai_latihan)->avg();
            $nilaiUlanganHarian = collect($siswa->nilai_ulangan_harian)->avg();
            $nilaiUlanganTengahSemester = $siswa->nilai_ulangan_tengah_semester;
            $nilaiUlanganSemester = $siswa->nilai_ulangan_semester;
            $nilaiAkhir = 0.15 * $nilaiLatihan + 0.2 * $nilaiUlanganHarian + 0.25 * $nilaiUlanganTengahSemester + 0.4 * $nilaiUlanganSemester;

            $detailSiswa = [
                'nama' => $siswa->nama,
                'nisn' => $siswa->nisn,
                'kelas' => $kelas->nama,
                'jurusan' => $kelas->jurusan,
                'nilai_latihan' => $siswa->nilai_latihan,
                'nilai_rata_rata_latihan' => $nilaiLatihan,
                'nilai_ulangan_harian' => $siswa->nilai_ulangan_harian,
                'nilai_rata_rata_ulangan_harian' => $nilaiUlanganHarian,
                'nilai_ulangan_tengah_semester' => $nilaiUlanganTengahSemester,
                'nilai_ulangan_semester' => $nilaiUlanganSemester,
                'nilai_akhir' => $nilaiAkhir
            ];
            return response()->json($detailSiswa);
        } else {
            return response()->json(['message' => 'Kelas tidak ditemukan'], 404);
        }
    } else {
        return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(nilai $nilai, siswa $siswa_id, mata_Pelajaran $mata_Pelajaran)
    {
        $siswa = siswa::findOrFail($siswa_id);
        $mata_Pelajaran = Mata_Pelajaran::findOrFail($mata_Pelajaran);
        $nilai = Nilai::where('siswa_id', $siswa_id)->where('mata_pelajaran_id', $mata_Pelajaran)->firstOrFail();

        return response()->json([
            'siswa' => $siswa,
            'mata_pelajaran' => $mata_Pelajaran,
            'nilai' => $nilai
        ]);
    }


}
