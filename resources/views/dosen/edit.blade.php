@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">Edit Data Dosen</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dosen.update', $dosen) }}" method="POST">
                @method('PUT')
                @include('dosen._form')
            </form>
        </div>
    </div>
@endsection
