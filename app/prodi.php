<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    public $timestamps = false;

    protected $table = "prodi";

    protected $primaryKey = 'kode_prodi';

    public $incrementing = false;

    protected $fillable = ['kode_prodi', 'nama_prodi'];

    public function kriteria()
    {
        return $this->belongsToMany('App\Kriteria');
    }

    public function nilaiPerbandingan()
    {
        return $this->hasMany('App\NilaiPerbandingan','kode_prodi');
    }
}
