@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">Tambah Data Mahasiswa</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @include('mahasiswa._form')
            </form>
        </div>
    </div>
@endsection
