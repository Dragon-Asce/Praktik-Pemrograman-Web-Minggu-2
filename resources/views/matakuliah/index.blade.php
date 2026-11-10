@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold text-primary">Daftar Mata Kuliah</h5>
            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="15%">Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th width="8%" class="text-center">SKS</th>
                            <th width="25%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data_matakuliah as $mk)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $mk->kode_mk }}</td>
                                <td class="align-middle">{{ $mk->nama_mk }}</td>
                                <td class="text-center align-middle">{{ $mk->sks }}</td>
                                <td class="text-center">
                                    <a href="{{ route('matakuliah.show', $mk) }}"
                                       class="btn btn-sm btn-info text-white">Detail</a>
                                    <a href="{{ route('matakuliah.edit', $mk) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('matakuliah.destroy', $mk) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada data mata kuliah.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
