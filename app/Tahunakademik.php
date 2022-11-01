<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahunakademik extends Model
{
    public $timestamps = false;

    protected $table = "tahun";

    protected $fillable = ['id_tahun', 'tahun_akademik'];
}
