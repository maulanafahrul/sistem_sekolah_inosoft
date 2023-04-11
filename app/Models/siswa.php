<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class siswa extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'siswas';
    protected  $guarded = ['id'];
    protected $fillable = [
        'nama',
        'nisn',
        'alamat',
        'kelas_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
