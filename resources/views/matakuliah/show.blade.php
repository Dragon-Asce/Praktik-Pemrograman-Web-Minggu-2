@extends('layouts.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">Detail Mata Kuliah</h5>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Kode MK</dt>
                <dd class="col-sm-9">{{ $matakuliah->kode_mk }}</dd>

                <dt class="col-sm-3">Nama Mata Kuliah</dt>
                <dd class="col-sm-9">{{ $matakuliah->nama_mk }}</dd>

                <dt class="col-sm-3">SKS</dt>
                <dd class="col-sm-9">{{ $matakuliah->sks }}</dd>

                <dt class="col-sm-3">Dibuat</dt>
                <dd class="col-sm-9">{{ $matakuliah->created_at?->format('d/m/Y H:i') ?? '-' }}</dd>

                <dt class="col-sm-3">Diperbarui</dt>
                <dd class="col-sm-9">{{ $matakuliah->updated_at?->format('d/m/Y H:i') ?? '-' }}</dd>
            </dl>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
            <a href="{{ route('matakuliah.edit', $matakuliah) }}" class="btn btn-warning btn-sm">Edit</a>
        </div>
    </div>
@endsection
