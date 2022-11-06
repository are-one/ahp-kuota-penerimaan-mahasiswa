<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\prodi;
use App\Tahunakademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HasilpenilaianController extends Controller
{
    public function index()
    {
        $kode_prodi = Input::get('kode_prodi', '');
        $id_tahun = Input::get('id_tahun', 0);

        $dataProdi = prodi::all();
        $dataTahun = Tahunakademik::all();

        $dataKriteria = Kriteria::all();

        $dataSubKriteria = [];

        $kriteriaProdi = prodi::find($kode_prodi)->prodiHasKriterias()->where('tahun_id', $id_tahun)->pluck('kode_prodi',)
        
        return view('hasil.index',[
            'dataProdi' => $dataProdi,
            'dataTahun' => $dataTahun,
            'dataKriteria' => $dataKriteria,
            'id_tahun' => $id_tahun,
            'kode_prodi' => $kode_prodi,
        ]);
    }
}
