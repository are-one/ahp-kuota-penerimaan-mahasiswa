<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    public $timestamps = false;

    protected $table = "prodi";

    protected $fillable = ['kode_prodi', 'nama_prodi'];

    public function kriteria()
    {
        return $this->belongsToMany('App\Kriteria');
    }
}
