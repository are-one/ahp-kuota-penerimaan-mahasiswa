@extends('layouts.master')
@section('title', 'SPK | Pembobotan')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-0"><i>Perbandingan Berpasangan</i></h6>
    </div>

    <div class="container-fluid pt-4 px-4">
        <form action="" method="POST">
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
                                                    <input type="number" min="1" max="9"
                                                        name="matriks[{{ $kode_baris }}][{{ $kode_kolom }}]"
                                                        id="" style="width: 50px" value="{{ $nilai }}">
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
                <div class="col-sm-12 col-xl-2">
                    <div class="h-100 p-0">
                    </div>
                </div>
                <div class="col-sm-12 col-xl-10">
                    <div class="h-100 p-0">
                        <button type="submit" name="proses" class="btn btn-md btn-success"><i class="fas fa-sync-alt"></i>
                            Proses</button>
                        <button type="submit" name="simpan" class="btn btn-md btn-primary"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-0"><i>Matriks Nilai Kriteria</i></h6>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-0">

                    <table class="table text-center table-bordered" id="banding-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                @foreach ($kriteria as $kode => $nama)
                                    <th scope="col">{{ $nama }}</th>
                                @endforeach
                                <th>Jumlah</th>
                                <th>Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- PERULANGAN BARIS --}}
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
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-0">

                    <table class="table text-center table-bordered" id="banding-table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                @foreach ($kriteria as $kode => $nama)
                                    <th scope="col">{{ $nama }}</th>
                                @endforeach
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- PERULANGAN BARIS --}}
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
                        </tbody>
                    </table>


                </div>
            </div>
            {{-- <div class="col-sm-12 col-xl-2">
                <div class="bg-light rounded px-0">
                    <table class="table text-center" id="banding2-table">
                        <thead>
                            <tr>
                                <th scope="col">Jumlah Perbaris</th>
                                <th scope="col" width="10%">Prioritas</th>
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
            </div> --}}
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

            <div class="col-sm-12 col-xl-2">
                <div class="bg-light rounded p-1">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>N = Jumlah Kriteria</p>
                                    <p>CI = Konsistency Index</p>
                                    <p>RI = Random Index</p>
                                    <p>CR = Consistency Rasio</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-light rounded p-1">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body text-center">
                                    <p>Rasio Konsistency Diterima</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row g-0">
                    <div class="col-sm-12 col-xl-4">
                        <div class="h-100 p-0">
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-9">
                        <div class="h-100 p-0">
                            <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-file-archive"></i>
                                Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
