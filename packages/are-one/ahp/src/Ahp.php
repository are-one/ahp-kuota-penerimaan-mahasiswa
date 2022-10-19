<?php

namespace AreOne\Ahp;

class Ahp
{
    public $kriteria;
    public $sub_kriteria;
    public $matriks;
    public $jumlah_kolom;

    public function __construct($kriteria, $sub_kriteria)
    {
        $this->kriteria = $kriteria; 
        $this->sub_kriteria = $sub_kriteria;
    }

    public function generate_matriks_perbandingan_berpasangan()
    {
        // Tujuan : Membuat struktur matriks berpasangan
        /*
            $matriks_perbandingan_berpasangan = [
                'K01' => [ 'K01' => 1, 'K02' => 3, 'K03' => 4, 'K04' => 4, 'K05' => 5 ],
                'K02' => [ 'K01' => 0.33, 'K02' => 1, 'K03' => 4, 'K04' => 4, 'K05' => 5 ],
                .....
            ]

        */

        $matriks_perbandingan_berpasangan = [];
        
        // Mengambil data kriteria yang akan di olah sebagai baris
        foreach ($this->kriteria as $kode_kriteria_baris => $data_baris) {

            // Membuat index baris matriks
            $matriks_perbandingan_berpasangan[$kode_kriteria_baris] = [];
            
            // Mengambil data kriteria yang akan diolah sebagai kolom
            foreach ($this->kriteria as $kode_kriteria_kolom => $data_kolom) {
                
                // Membuat index kolom dan mengisi nilai dengan 0
                $matriks_perbandingan_berpasangan[$kode_kriteria_baris][$kode_kriteria_kolom] = 0;
            }
        }

        $this->matriks = $matriks_perbandingan_berpasangan;

        return $matriks_perbandingan_berpasangan;
        
    }

    public function set_matriks_values($data_nilai)
    {
        // Tujuan: Mengisi nilai matriks sesuai inputan

        $matriks_lama = $this->matriks;
        $matriks_baru = $matriks_lama;
        $total_kolom = [];

        foreach ($matriks_lama as $kode_baris => $data_baris) {

            foreach ($data_baris as $kode_kolom => $nilai_lama) {
                if(!isset($total_kolom[$kode_kolom])) {
                    $total_kolom[$kode_kolom] = 0;
                }

                $nilai_baru = 0;
                if($kode_baris == $kode_kolom){
                    $nilai_baru = 1;
                    $matriks_baru[$kode_baris][$kode_kolom] = $nilai_baru;

                }else{
                    $nilai_baru = isset($data_nilai[$kode_baris][$kode_kolom])
                                        ? 
                                    $data_nilai[$kode_baris][$kode_kolom] 
                                        : 
                                    round(1 / $data_nilai[$kode_kolom][$kode_baris], 2);

                    $matriks_baru[$kode_baris][$kode_kolom] = $nilai_baru;
                }

                $total_kolom[$kode_kolom] += $nilai_baru;
            }

        }

        /*
            [
                'matriks' => [
                    'K01' => [ 'K01' => 1, 'K02' => 3, 'K03' => 4, 'K04' => 4, 'K05' => 5 ],
                    'K02' => [ 'K01' => 0.33, 'K02' => 1, 'K03' => 4, 'K04' => 4, 'K05' => 5 ],
                    .....
                ],
                'total_kolom' => ['K01' => 2.4, 'K02' => 3.4, .....]
            ]
        */

        return [
            'matriks' => $matriks_baru,
            'total_kolom' => $total_kolom
        ];


    }
}