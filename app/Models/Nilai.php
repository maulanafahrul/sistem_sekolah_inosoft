<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'nilais';
    protected $guarded = ['id'];
    protected $fillable = [
        'siswa_id','mata_pelajaran_id',
        'latihan_1','latihan_2','latihan_3','latihan_4',
        'ulangan_harian_1','ulangan_harian_2',
        'ulangan_tengah_semester','ulangan_semester'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'siswa_id','_id');
    }

    public function mata_pelajaran()
    {
        return $this->belongsTo(Mata_pelajaran::class) ;
    }
    
}
