<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prodi;
use App\Tahunakademik;
use App\Kriteria;


class KriteriaController extends Controller
{
    public function index()
    {
        $data['prodi'] = prodi::pluck('nama_prodi', 'kode_prodi');
        $data['tahun'] = Tahunakademik::pluck('tahun_akademik', 'id_tahun');
        return view('kriteria.index', $data);
    }
}
