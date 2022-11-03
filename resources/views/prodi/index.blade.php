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
                @include('alert')
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="prodi-table">
                        <thead>
                            <tr>
                                <th scope="col" width="100">Kode Prodi</th>
                                <th scope="col">Nama Prodi</th>
                                <th scope="col" width="100">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    $(function() {
        $('#prodi-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/prodi/json',
            columns: [{
                    data: 'kode_prodi',
                    name: 'kode_prodi'
                },
                {
                    data: 'nama_prodi',
                    name: 'nama_prodi'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });
</script>
@endpush