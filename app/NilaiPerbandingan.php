<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiPerbandingan extends Model
{
    public $timestamps = false;

    protected $table = "nilai_perbandingan";

    protected $fillable = ['kode_prodi','kriteria_id', 'kriteria_id1', 'nilai', 'tahun_id'];

    public function prodi()
    {
        return $this->belongsTo('App\prodi',);
    }
}
