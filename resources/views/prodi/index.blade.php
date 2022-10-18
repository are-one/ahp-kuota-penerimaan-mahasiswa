@extends('layouts.master')
@section ('title', 'SPK | Data Prodi')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Data Program Studi</i></h6>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-12">
            <div class="bg-light rounded vh-100 p-4">
                <a href="/prodi/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Baru</a>
                <hr>
                <div class="table-responsive">
                    <table class="table text-center" id="prodi-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Prodi</th>
                                <th scope="col">Nama Prodi</th>
                                <th scope="col">Mahasiswa Aktif</th>
                                <th scope="col">Dosen Aktif</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>F1A3</td>
                                <td>Ilmu Komputer</td>
                                <td>340</td>
                                <td>20</td>
                                <td>123</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection