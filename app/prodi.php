<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    public $timestamps = false;

    protected $table = "prodi";

    protected $primaryKey = 'kode_prodi';

    // agar primary yang string tidak increment atau bertambah 1, akibat nya primary yang string akan selalu 0
    public $incrementing = false;

    protected $fillable = ['kode_prodi', 'nama_prodi'];

    public function kriteria()
    {
        return $this->belongsToMany('App\Kriteria', 'nilai_perbandingan');
    }

    public function nilaiPerbandingan()
    {
        return $this->hasMany('App\NilaiPerbandingan','kode_prodi');
    }

    public function prodiHasKriterias()
    {
        return $this->hasMany('App\prodihaskriteria', 'kode_prodi');
    }
}
