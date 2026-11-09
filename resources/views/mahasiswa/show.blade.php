@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">Detail Mahasiswa</h5>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">NIM</dt>
                <dd class="col-sm-9">{{ $mahasiswa->nim }}</dd>

                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $mahasiswa->nama }}</dd>

                <dt class="col-sm-3">Prodi</dt>
                <dd class="col-sm-9">{{ $mahasiswa->prodi }}</dd>

                <dt class="col-sm-3">Angkatan</dt>
                <dd class="col-sm-9">{{ $mahasiswa->angkatan }}</dd>

                <dt class="col-sm-3">Alamat</dt>
                <dd class="col-sm-9">{{ $mahasiswa->alamat ?? '-' }}</dd>
            </dl>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>
@endsection
