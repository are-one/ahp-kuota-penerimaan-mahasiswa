@extends('layouts.master')
@section ('title', 'SPK | Home')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light justify-content-center vh-100 p-5 mx-0">
        <div class="col-md-7 text-center">
            <span class="login100-form-logo">
                <img src="/admin/img/uho.png" alt="" srcset="" height="150" width="150">
            </span>
            <h2> Sistem Pendukung Keputusan</h2>
            <h3>Kuota Mahasiswa Baru FMIPA</h3>
            <h4 class="mb-5">Universitas Halu Oleo</h4>
            <p class="mb-4">Kampus Hijau Bumi Tridharma, Anduonohu, Kec. Kambu, Kota Kendari Sulawesi Tenggara 93232</p>
            @if (session('status'))
            <div class="alert alert-success text-center" role="alert">
                <h5> Anda Berhasil LOGIN!! </h5>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection