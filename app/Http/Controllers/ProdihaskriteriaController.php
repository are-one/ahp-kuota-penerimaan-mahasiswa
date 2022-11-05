<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdihaskriteriaController extends Controller
{


    public function simpandata(Request $request)
    {
        $kriteria = new Kriteria();
        $kriteria->nilai_prioritas = $request->addNilaiPrioritas;
        $kriteria->save();
        return redirect('prodi.detail')->with('status', 'Data Prodi Berhasil Disimpan');
    }
}
