<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_pelajaran extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
	protected $collection = 'mata_pelajaran';
    protected $guarded = ['id'];
    protected $fillable = ['mata_pelajaran'];
}
