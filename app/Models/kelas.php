<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class kelas extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'kelas';
    protected  $guarded = ['_id'];
    protected $fillable = [
        'nama'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
