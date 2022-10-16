@extends('layouts.master')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <h6 class="mb-0">Perbandingan Berpasangan</h6>
        <div class="col-sm-12 col-xl-2"><br><br><br><br>
            <div class="bg-light rounded h-100 p-0">
                <table class=" table">
                    <tr>
                        <th scope="col">Jml.Mahasiswa Aktif</th>
                    </tr>
                    <tr>
                        <th scope="col">Jml.Mahasiswa TA</th>
                    </tr>
                    <tr>
                        <th scope="col">Jml.Dosen Aktif</th>
                    </tr>
                    <tr>
                        <th scope="col">Jumlah Ruangan</th>
                    </tr>
                    <tr>
                        <th scope="col">Jml.Kapasitas Ruangan</th>
                    </tr>

                </table>
            </div>
        </div>
        <div class="col-sm-12 col-xl-7">
            <div class="bg-light rounded h-100 p-2">
                <h6 class="mb-4 text-light">.</h6>
                <table class="table text-center">
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
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3">
            <div class="bg-light rounded h-100 p-2">
                <h6 class="mb-4 text-light">.</h6>
                <table class="table text-center">
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
            <div class="bg-light rounded h-100 p-0">
            </div>
        </div>
        <div class="col-sm-12 col-xl-10">
            <div class="bg-light rounded h-100 p-0">
                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-sync-alt"></i> Proses</button>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <h6 class="mb-0">Penjumlahan</h6>
        <div class="col-sm-12 col-xl-7">
            <div class="bg-light rounded h-100 p-0">
                <h6 class="mb-4 text-light">.</h6>
                <table class="table text-center">
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
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-xl-3">
            <div class="bg-light rounded h-100 p-2">
                <h6 class="mb-4 text-light">.</h6>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Jumlah Perbaris</th>
                            <th scope="col">Prioritas</th>
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
</div>

@endsection