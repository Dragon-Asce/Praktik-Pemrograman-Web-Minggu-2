@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">Tambah Data Mata Kuliah</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('matakuliah.store') }}" method="POST">
                @include('matakuliah._form')
            </form>
        </div>
    </div>
@endsection
