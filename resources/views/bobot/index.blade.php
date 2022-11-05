@extends('layouts.master')
@section('title', 'SPK | Pembobotan')
@section('content')

<div class="container-fluid pt-4 px-4">
    <h6><i>Program Studi dan Tahun Akademik</i></h6>
    <form class="row g-4" action="" method="GET">

        <div class="col">
                <select name="kode_prodi" class="form-select">
                    <option value="">Pilih Prodi ...</option>
                    @foreach ($dataProdi as $prodi)
                        <option value="{{$prodi->kode_prodi}}">{{$prodi->nama_prodi}}</option>
                    @endforeach
                </select>
        </div>
        <div class="col">
            <select name="id_tahun" class="form-select">
                <option value="">Pilih Prodi ...</option>
                @foreach ($dataTahun as $tahun)
                    <option value="{{$tahun->id_tahun}}">{{$tahun->tahun_akademik}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i>
                    Cari Data</button>
        </div>
    </form>
</div>

<div class="container-fluid pt-4 px-4">
    <form action="" method="POST">
        <h6><i>Perbandingan Berpasangan</i></h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded p-0">
                    <table class="table text-center table-bordered" id="banding-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                @foreach ($kriteria as $kode => $nama)
                                <th scope="col">{{ $nama }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php($list_input = [])
                            @csrf
                            @foreach ($kriteria as $kode_baris => $nama)
                            <tr>
                                <th scope="col">{{ $nama }}</th>
                                @foreach ($matriks[$kode_baris] as $kode_kolom => $nilai)
                                @if (isset($list_input[$kode_baris][$kode_kolom]) ||
                                isset($list_input[$kode_kolom][$kode_baris]) ||
                                $kode_kolom == $kode_baris)
                                <td style="vertical-align: middle">
                                    {{ number_format("$nilai", 2, ',', '.') }}
                                </td>
                                @else
                                <td style="vertical-align: middle">
                                    <input type="number" min="1" max="9" name="matriks[{{ $kode_baris }}][{{ $kode_kolom }}]" id="" style="width: 50px" value="{{ $nilai }}">
                                </td>
                                @php($list_input[$kode_baris][$kode_kolom] = true)
                                @endif
                                @endforeach
                            </tr>
                            @endforeach
                            <tr>
                                <th>Jumlah</th>
                                @foreach ($total_kolom as $kode_kolom => $nilai_total)
                                <td style="vertical-align: middle">
                                    <b>{{ number_format("$nilai_total", 2, ',', '.') }}</b>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-sm-12 col-xl-3">
                <div class="bg-light rounded p-0">
                    <table class="table text-center" id="banding2-table">
                        <thead>
                            <tr>
                                <th scope="col">Jumlah Ruangan</th>
                                <th scope="col">Jml.Kapasitas Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>30</td>
                                <td>40</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-sm-12 col-xl-12 text-center">
                <div class="h-100 p-0">
                    <button type="submit" name="simpan" class="btn btn-sm btn-success"><i class="fas fa-sync-alt"></i>
                        Proses Data</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid pt-4 px-4">
    <h6><i>Matriks Nilai Kriteria 1</i></h6>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-0">
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>
                            @if (isset($matriks_kriteria[$kode_baris]))
                            <th scope="col"></th>
                            @endif
                            @foreach ($kriteria as $kode => $nama)
                            <th scope="col">{{ $nama }}</th>
                            @endforeach
                            <th>Jumlah</th>
                            <th>Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- PERULANGAN BARIS --}}
                        @if (isset($matriks_kriteria[$kode_baris]))
                        @foreach ($kriteria as $kode_baris => $nama)
                        <tr>
                            <th scope="col">{{ $nama }}</th>
                            {{-- PERULANGAN KOLOM --}}
                            @foreach ($matriks_kriteria[$kode_baris] as $kode_kolom => $nilai)
                            <td style="vertical-align: middle">
                                {{ number_format("$nilai", 2, ',', '.') }}
                            </td>
                            @endforeach
                            <td>
                                <b>{{ round($jumlah_matriks_kriteria[$kode_baris], 2) }}</b>
                            </td>
                            <td>
                                <b>{{ round($prioritas_matriks_kriteria[$kode_baris], 2) }}</b>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="{{ count($kriteria) + 2}}">
                                Tidak ada data perhitungan
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <h6><i>Matriks Nilai Kriteria 2</i></h6>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-0">
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>
                            @if (isset($matriks_kriteria_2[$kode_baris]))
                            <th scope="col"></th>
                            @endif
                            @foreach ($kriteria as $kode => $nama)
                            <th scope="col">{{ $nama }}</th>
                            @endforeach
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- PERULANGAN BARIS --}}
                        @if (isset($matriks_kriteria_2[$kode_baris]))
                        @foreach ($kriteria as $kode_baris => $nama)
                        <tr>
                            <th scope="col">{{ $nama }}</th>
                            {{-- PERULANGAN KOLOM --}}
                            @foreach ($matriks_kriteria_2[$kode_baris] as $kode_kolom => $nilai_kriteria_2)
                            <td style="vertical-align: middle">
                                {{ number_format("$nilai_kriteria_2", 2, ',', '.') }}
                            </td>
                            @endforeach
                            <td>
                                <b>{{ round($jumlah_matriks_kriteria_2[$kode_baris], 2) }}</b>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="{{ count($kriteria) + 1}}">
                                Tidak ada data perhitungan
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>


    <h6><i>Perhitungan Rasio Konsistensi</i></h6>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-0">
                <table class="table text-center table-bordered" id="banding-table">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Jumlah Perbaris</th>
                            <th>Prioritas</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($jumlah_matriks_kriteria_2) > 0)
                        <?php $jumlah = 0; ?>
                        @foreach ($kriteria as $kode => $nama)
                        @php($jumlah = $jumlah + round($prioritas_matriks_kriteria[$kode]+$jumlah_matriks_kriteria_2[$kode], 2))
                        <tr>
                            <td>{{$nama}}</td>
                            <td>{{round($jumlah_matriks_kriteria_2[$kode], 2)}}</td>
                            <td>{{round($prioritas_matriks_kriteria[$kode], 2)}}</td>
                            <td>{{round($prioritas_matriks_kriteria[$kode]+$jumlah_matriks_kriteria_2[$kode], 2)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Jumlah</b></td>
                            <td><b>{{$jumlah}}</b></td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="{{ count($kriteria) + 1}}">
                                Tidak ada data perhitungan
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>


    <h6><i>Bobot Masing-Masing Kriteria</i></h6>
    <div class="row justify-content-center g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded p-0">
                <table class="table text-center table-bordered" id="banding-table">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($prioritas_matriks_kriteria) > 0)
                        @foreach ($kriteria as $kode => $nama)
                        <tr>
                            <td>{{$nama}}</td>
                            <td>{{round($prioritas_matriks_kriteria[$kode], 2)}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="{{ count($kriteria) + 1}}">
                                Tidak ada data perhitungan
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>

    <h6><i>Nilai Prioritas Kriteria</i></h6>
    <div class="row justify-content-center g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded p-0">
                <table class="table text-center table-bordered" id="banding-table">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Nilai Sub Kriteria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $kode => $nama)
                        <tr>
                            <td>{{$nama}}</td>
                            <td>{{$nilai_sub_kriteria[$kode]}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <table class="" style="border:none" id="banding-table">
                    <tbody>
                        @php($text_penjumlahan_kriteria = [])
                        @php($angka_penjumlahan_kriteria = [])
                        @if(count($prioritas_matriks_kriteria) > 0)
                        @foreach ($kriteria as $kode => $nama)
                        @php($text_penjumlahan_kriteria[]= $nama)
                        @php($angka_penjumlahan_kriteria[]= round($nilai_sub_kriteria[$kode]*$prioritas_matriks_kriteria[$kode],2))
                        <tr>
                            <td>{{$nama}}</td>
                            <td>&nbsp;=</td>
                            <td>&nbsp;Nilai prioritas sub kriteria {{$nama}} * Nilai prioritas {{$nama}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;=</td>
                            <td>&nbsp;{{$nilai_sub_kriteria[$kode]}} * {{round($prioritas_matriks_kriteria[$kode], 2)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;=</td>
                            <td>&nbsp;{{round($nilai_sub_kriteria[$kode]*$prioritas_matriks_kriteria[$kode],2)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Nilai Akhir</td>
                            <td>&nbsp;=</td>
                            <td>&nbsp;{{implode(" + ", $text_penjumlahan_kriteria)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;=</td>
                            <td>&nbsp;{{implode(" + ", $angka_penjumlahan_kriteria)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>&nbsp;=</td>
                            <td>&nbsp; {{array_sum($angka_penjumlahan_kriteria)}}</td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="{{ count($kriteria) + 1}}">
                                Tidak ada data perhitungan
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>


    <div class="row justify-content-center  g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light text-center rounded p-4">
                <h4 style="font-family: cambria"><b>Kesimpulan</b></h4>
                @if(count($prioritas_matriks_kriteria) > 0)
                <p>Presentase hasil keputusan akhir yang diperoleh melalui perhitungan AHP yaitu sebesar <b>{{array_sum($angka_penjumlahan_kriteria)}} %</b></p>
                @else
                <p>Tidak Ada Data Perhitungan</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection