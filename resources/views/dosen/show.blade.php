@extends('layouts.app')

@section('title', 'Detail Dosen')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">Detail Dosen</h5>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">NIDN</dt>
                <dd class="col-sm-9">{{ $dosen->nidn }}</dd>

                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $dosen->nama }}</dd>

                <dt class="col-sm-3">Bidang Keahlian</dt>
                <dd class="col-sm-9">{{ $dosen->bidang_keahlian }}</dd>

                <dt class="col-sm-3">Dibuat</dt>
                <dd class="col-sm-9">{{ $dosen->created_at?->format('d/m/Y H:i') ?? '-' }}</dd>

                <dt class="col-sm-3">Diperbarui</dt>
                <dd class="col-sm-9">{{ $dosen->updated_at?->format('d/m/Y H:i') ?? '-' }}</dd>
            </dl>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
            <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-warning btn-sm">Edit</a>
        </div>
    </div>
@endsection
