<?php

namespace App\Http\Controllers;

use App\Kriteria;
use AreOne\Ahp\Ahp;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Helper;

class BobotController extends Controller
{

    public function index(Request $request)
    {
        $dataKriteria = Kriteria::all();
        $kriteria = [];
        foreach ($dataKriteria as $i => $dk) {
            $kriteria[$dk->id] = $dk->nama_kriteria;
        }
        // dd($kriteria);
        // Dummy
        // $kriteria = [
        //     'K01' => 'Kapasitas Ruangan',
        //     'K02' => 'Jumlah Ruangan',
        //     'K03' => 'Dosen Aktif',
        //     'K04' => 'Mahasiswa Tingkat Akhir',
        //     'K05' => 'Mahasiswa Aktif'
        // ];

        
        // Ambil data nilai sub kriteri dari table prodi has kriteria
        $nilai_sub_kriteria = [];

        foreach ($kriteria as $id => $_) {
            $nilai_sub_kriteria[$id] = 45;
        }


        $sub_kriteria = [
            'K01' => [50, 40, 30, 20, 10],
            'K02' => [50, 40, 30, 20, 10],
            'K03' => [50, 40, 30, 20, 10],
            'K04' => [50, 40, 30, 20, 10],
            'K05' => [50, 40, 30, 20, 10]
        ];
        
        // $nilai_sub_kriteria = [
        //     'K01' => 40,
        //     'K02' => 50,
        //     'K03' => 40,
        //     'K04' => 40,
        //     'K05' => 50
        // ];

        $modelAhp = new Ahp($kriteria, $sub_kriteria);

        $matriks = ($modelAhp->generate_matriks_perbandingan_berpasangan());
        $total_kolom = [];
        $matriks_kriteria = [];
        $jumlah_matriks_kriteria = [];
        $matriks_kriteria_2 = [];
        $jumlah_matriks_kriteria_2 = [];
        $prioritas_matriks_kriteria = [];


        if ($request->method() == "POST") {
            $data_nilai = $request->input('matriks');
            $matriks_perbandingan = $modelAhp->set_nilai_matriks_perbadingan_berpasanagan($data_nilai);

            $matriks = $matriks_perbandingan['matriks'];
            $total_kolom = $matriks_perbandingan['total_kolom'];

            $data_matriks_kriteria = $modelAhp->set_nilai_matriks_kriteria($matriks, $total_kolom);

            $matriks_kriteria = $data_matriks_kriteria['matriks_kriteria'];
            $jumlah_matriks_kriteria = $data_matriks_kriteria['jumlah_kriteria'];
            $prioritas_matriks_kriteria = $data_matriks_kriteria['nilai_prioritas'];

            $data_matriks_kriteria_2 = $modelAhp->set_nilai_matriks_kriteria_2($matriks, $prioritas_matriks_kriteria);

            $matriks_kriteria_2 = $data_matriks_kriteria_2['matriks_kriteria_2'];
            $jumlah_matriks_kriteria_2 = $data_matriks_kriteria_2['jumlah_matriks_kriteria_2'];
        }
        //dd($jumlah_matriks_kriteria_2);
        return view('bobot.index', [
            'nilai_sub_kriteria' => $nilai_sub_kriteria,
            'kriteria' => $kriteria,
            'matriks' => $matriks,
            'total_kolom' => $total_kolom,
            'matriks_kriteria' => $matriks_kriteria,
            'jumlah_matriks_kriteria' => $jumlah_matriks_kriteria,
            'prioritas_matriks_kriteria' => $prioritas_matriks_kriteria,
            'matriks_kriteria_2' => $matriks_kriteria_2,
            'jumlah_matriks_kriteria_2' => $jumlah_matriks_kriteria_2,
        ]);
    }

    public function simpanBobot()
    {
        
    }
}
