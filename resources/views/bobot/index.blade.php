@extends('layouts.master')

@section('content')

<div class="container">
    <h6><i> Perbandingan Berpasangan</i></h6>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-7">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="card-body">
                            <table class="table table-bordered" id="users-table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Jum.Mahasiswa Aktif</th>
                                        <th>Jum.Mahasiswa TA</th>
                                        <th>Jum.Dosen Aktif</th>
                                        <th>Jumlah Ruangan</th>
                                        <th>Jum.Kapasitas Ruangan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Salse & Revenue</h6>
                        <a href="">Show All</a>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row justify-content-center">
        <div class="col-md-2">

        </div>

        <div class="col-md-7">

            <div class="card-body">
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr class="text-center">
                            <th>Jum.Mahasiswa Aktif</th>
                            <th>Jum.Mahasiswa TA</th>
                            <th>Jum.Dosen Aktif</th>
                            <th>Jumlah Ruangan</th>
                            <th>Jum.Kapasitas Ruangan</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
        <div class="col-md-3">

            <div class="card-body">
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr class="text-center">
                            <th>Jml. Ruangan</th>
                            <th>Jml. Kapasitas Ruangan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> -->
</div>

@endsection