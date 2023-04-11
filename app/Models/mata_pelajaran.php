<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class mata_pelajaran extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'mata_pelajaran';
    protected  $guarded = ['id'];
    protected $fillable = [
        'nama'
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
