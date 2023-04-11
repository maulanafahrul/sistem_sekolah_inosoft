<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class nilai extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'nilais';
    protected  $guarded = ['id'];
    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'latihan_satu',
        'latihan_dua',
        'latihan_tiga',
        'latihan_empat',
        'ulangan_harian_satu',
        'ulangan_harian_dua',
        'ulangan_tengah_semester',
        'ulangan_semester'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
