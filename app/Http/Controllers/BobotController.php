<?php

namespace App\Http\Controllers;

use AreOne\Ahp\Ahp;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index(Request $request)
    {
        $kriteria = [
            'K01' => 'Kapasitas Ruangan',
            'K02' => 'Jumlah Ruangan',
            'K03' => 'Dosen Aktif',
            'K04' => 'Mahasiswa Tingkat Akhir',
            'K05' => 'Mahasiswa Aktif'
        ];

        $sub_kriteria = [
            'K01' => [50, 40, 30, 20,10],
            'K02' => [50, 40, 30, 20,10],
            'K03' => [50, 40, 30, 20,10],
            'K04' => [50, 40, 30, 20,10],
            'K05' => [50, 40, 30, 20,10]
        ];

        $modelAhp = new Ahp($kriteria, $sub_kriteria);

        
        $matriks = ($modelAhp->generate_matriks_perbandingan_berpasangan());
        $total_kolom = [];
        
        if($request->method() == "POST"){
            $data_nilai = $request->input('matriks');
            $matriks_perbandingan = $modelAhp->set_matriks_values($data_nilai);

            $matriks = $matriks_perbandingan['matriks'];
            $total_kolom = $matriks_perbandingan['total_kolom'];
        }

        return view('bobot.index',[
            'kriteria' => $kriteria,
            'matriks' => $matriks,
            'total_kolom' => $total_kolom
        ]);
    }
}