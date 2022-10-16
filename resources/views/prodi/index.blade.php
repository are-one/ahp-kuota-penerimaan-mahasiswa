@extends('layouts.master')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><i>Data Program Studi</i></h6>
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