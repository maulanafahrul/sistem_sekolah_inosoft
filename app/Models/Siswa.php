<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\model;

class Siswa extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
	protected $collection = 'siswas';
    protected $guarded = ['id'];
    protected $fillable = ['nama','kelas_id'];
}
