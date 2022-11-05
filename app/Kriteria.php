<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public $timestamps = false;

    protected $table = "kriteria";

    protected $fillable = ['id', 'nama_kriteria', 'nilai_prioritas'];

    public function prodis()
    {
        return $this->belongsToMany('App\prodi','nilai_perbandingan');
    }
}
