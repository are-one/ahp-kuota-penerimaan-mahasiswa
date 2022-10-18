@extends('layouts.master')
@section ('title', 'SPK | Pembobotan')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Perbandingan Berpasangan</i></h6>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-9">
            <div class="bg-light rounded p-0">
                <table class="table text-center" id="banding-table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Jml.Mahasiswa Aktif</th>
                            <th scope="col">Jml.Mahasiswa TA</th>
                            <th scope="col">Jml.Dosen Aktif</th>
                            <th scope="col">Jumlah Ruangan</th>
                            <th scope="col" width="20">Jml.Kapasitas Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">Jml.Mahasiswa Aktif</th>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>

                        <tr>
                            <th scope="col">Jml.Mahasiswa TA</th>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <th scope="col">Jml.Dosen Aktif</th>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <th scope="col">Jumlah Ruangan</th>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <th scope="col">Jml.Kapasitas Ruangan</th>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <th scope="col">Jumlah</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                <button type="submit" class="btn btn-md btn-success"><i class="fas fa-sync-alt"></i> Proses</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Penjumlahan</i></h6>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-7">
            <div class="bg-light rounded p-0">
                <table class="table text-center" id="jumlah-table">
                    <thead>
                        <tr>
                            <th scope="col">Jml.Mahasiswa Aktif</th>
                            <th scope="col">Jml.Mahasiswa TA</th>
                            <th scope="col">Jml.Dosen Aktif</th>
                            <th scope="col">Jumlah Ruangan</th>
                            <th scope="col">Jml.Kapasitas Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>100</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-xl-2">
            <div class="bg-light rounded p-0">
                <table class="table text-center" id="jumlah2-table">
                    <thead>
                        <tr>
                            <th scope="col" width="10">Jumlah Perbaris</th>
                            <th scope="col">Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>40</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3">
            <div class="bg-light rounded p-1">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
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
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
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
                        <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-file-archive"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection