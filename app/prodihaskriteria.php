<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodihaskriteria extends Model
{
    public $timestamps = false;

    protected $table = "prodi_has_kriteria";

    protected $fillable = ['kode_prodi', 'kriteria_id', 'nilai', 'tahun_id_tahun'];
}
