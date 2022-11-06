<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\prodi;
use App\prodihaskriteria;
use App\Tahunakademik;
use AreOne\Ahp\Ahp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HasilpenilaianController extends Controller
{
    public function index(Request $request)
    {
        $id_tahun = Input::get('id_tahun', 0);

        $dataProdi = prodi::all();
        $dataTahun = Tahunakademik::all();

        $dataKriteria = Kriteria::all();

        $dataSubKriteria = [];

        $prodiHasKriteria = prodihaskriteria::where('tahun_id',$id_tahun)->get();
        $tahun = Tahunakademik::where('id_tahun', $id_tahun)->first();

        $nilaiKriteria = [];
        if($prodiHasKriteria != null && $tahun != null){
            foreach ($prodiHasKriteria as $i => $data) {
                $nilaiKriteria[$data->kode_prodi][$data->kriteria_id] = $data->nilai;
            }
        }
        // dd($tahun);

        if($tahun == null && $id_tahun != 0){
            $request->session()->now('status', 'Silahkan pilih tahun akademik terlebih dahulu');
        }elseif(count($prodiHasKriteria) < 1 && $id_tahun != 0){
            $request->session()->now('status', 'Data di tahun '.$tahun->tahun_akademik.' tidak ditemukan');
        }

        $keputusan = [];
        if ($request->method() == "POST" && $tahun != null && $dataProdi != null) {
            $keputusan = $this->proses($tahun, $dataProdi);
        }

        return view('hasil.index',[
            'dataProdi' => $dataProdi,
            'dataTahun' => $dataTahun,
            'dataKriteria' => $dataKriteria,
            'id_tahun' => $id_tahun,
            'nilaiKriteria' => $nilaiKriteria,
            'keputusan' => $keputusan,
        ]);
    }

    public function proses($tahun, $dataProdi)
    {
        $hasil = [];
        foreach ($dataProdi as  $prodi) {
            $kode_prodi = $prodi->kode_prodi;
            $hasil[$kode_prodi] = 0;


            $dataKriteria = Kriteria::all();

            $kriteria = [];
            foreach ($dataKriteria as $i => $dk) {
                $kriteria[$dk->id] = $dk->nama_kriteria;
            }

            $phk = [];
            if($prodi){
                $phk = prodi::find($kode_prodi)->prodiHasKriterias()->where('tahun_id', $tahun->id_tahun)->pluck('nilai', 'kriteria_id');
            }

            $nilai_sub_kriteria = $phk;

            $modelAhp = new Ahp($kriteria, []);
        
            $matriks = ($modelAhp->generate_matriks_perbandingan_berpasangan());
            $total_kolom = [];

            $prioritas_matriks_kriteria = [];

            $nilai_perbandingan = prodi::find($kode_prodi)->nilaiPerbandingan()->where('tahun_id', $tahun->id_tahun)->get();

            if($nilai_perbandingan){
                foreach ($nilai_perbandingan as $nilai) {
                   $matriks[$nilai->kriteria_id][$nilai->kriteria_id1] = $nilai->nilai;
                }
            }

            $matriks_perbandingan = $modelAhp->set_nilai_matriks_perbadingan_berpasanagan($matriks);

            $matriks = $matriks_perbandingan['matriks'];
            $total_kolom = $matriks_perbandingan['total_kolom'];

            $data_matriks_kriteria = $modelAhp->set_nilai_matriks_kriteria($matriks, $total_kolom);

           
            $prioritas_matriks_kriteria = $data_matriks_kriteria['nilai_prioritas'];

            $data_matriks_kriteria_2 = $modelAhp->set_nilai_matriks_kriteria_2($matriks, $prioritas_matriks_kriteria);

            // dd($prioritas_matriks_kriteria);
            $angka_penjumlahan_kriteria = [];
            foreach ($kriteria as $id_kriteria => $nama_kriteria) {
                $angka_penjumlahan_kriteria[]= isset($nilai_sub_kriteria[$id_kriteria])? round($nilai_sub_kriteria[$id_kriteria]*$prioritas_matriks_kriteria[$id_kriteria],2) : 0;
            }

            // dd($angka_penjumlahan_kriteria);
            $hasil[$kode_prodi] = array_sum($angka_penjumlahan_kriteria);

        }

        return $hasil;
    }
}
