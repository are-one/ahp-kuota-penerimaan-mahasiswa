@extends('layouts.master')
@section ('title', 'SPK | Hasil Penilaian')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-0"><i>Tahun Akademik</i></h6>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">

        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <a href="/tahun_akademik/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Baru</a>
                <hr>
                @include('alert')
                <div class="table-responsive">
                    <table class="table text-center" id="tahun-table">
                        <thead>
                            <tr>
                                <th scope="col">Kode Tahun Akademik</th>
                                <th scope="col">Tahun Akademik</th>
                                <th scope="col">Aksi</th>
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
        $('#tahun-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/tahun_akademik/json',
            columns: [{
                    data: 'id_tahun',
                    name: 'id_tahun'
                },
                {
                    data: 'tahun_akademik',
                    name: 'tahun_akademik'
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