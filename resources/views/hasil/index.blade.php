@extends('layouts.master')
@section ('title', 'SPK | Hasil Penilaian')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <h6 class="mb-0"><i>Proses Akhir Penilaian AHP</i></h6>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-sm-12 col-xl-12">
            @include('alert')
            <div class="bg-light rounded p-4">
                <h6><i>Tahun Akademik</i></h6>
                <form class="row g-4" action="" method="GET">
            
                    <div class="col">
                        <select name="id_tahun" class="form-select">
                            <option value="">Pilih tahun akademik ...</option>
                            @foreach ($dataTahun as $tahun)
                                <option value="{{$tahun->id_tahun}}" {{ ($tahun->id_tahun == $id_tahun)? 'selected' : '' }}>{{$tahun->tahun_akademik}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i>
                                Cari Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center mx-0">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-4">
                <table class="table text-center" id="hasil-table">
                    <thead>
                        <tr>
                            <th scope="col">Prodi</th>
                            @foreach ($dataKriteria as $kriteria)
                                <th scope="col">{{ $kriteria->nama_kriteria }}</th>
                            @endforeach
    
                            @if ($keputusan)
                                <th scope="col">Keputusan</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($dataProdi as $prodi)
                            <tr>
                                <td class="text-start">
                                    {{ $prodi->nama_prodi}}
                                    <br><small class="text-muted">{{ $prodi->kode_prodi}}</small>
                                </td>

                                @foreach ($dataKriteria as $kriteria)
                                    <td style="vertical-align: middle">{{ isset($nilaiKriteria[$prodi->kode_prodi][$kriteria->id]) ? $nilaiKriteria[$prodi->kode_prodi][$kriteria->id] : 0  }}</td>    
                                @endforeach
                                
                                @if ($keputusan)
                                    <td style="vertical-align: middle">{!! (($keputusan[$prodi->kode_prodi] > 0)? '<span class="badge bg-success">'.$keputusan[$prodi->kode_prodi].'</span>': '<span class="badge bg-danger">0</span>') !!}</td>
                                @endif
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="row g-0">
        <div class="col-sm-12 col-xl-8">
            <div class="h-100 p-0">
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="h-100 p-0">
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-file-archive"></i> Proses</button>
                    <a href="{{ url("/cetak-hasil/{$id_tahun}") }}" class="btn btn-md btn-danger"><i class="fas fa-print"></i> Cetak</a>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection