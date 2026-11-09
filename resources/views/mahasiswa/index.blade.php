@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold text-primary">Daftar Mahasiswa Aktif</h5>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="15%" class="text-center">NIM</th>
                            <th>Nama Lengkap</th>
                            <th>Prodi</th>
                            <th width="25%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data_mhs as $mhs)
                            <tr>
                                <td class="text-center align-middle">{{ $mhs->nim }}</td>
                                <td class="align-middle">{{ $mhs->nama }}</td>
                                <td class="align-middle">{{ $mhs->prodi }}</td>
                                <td class="text-center">
                                    <a href="{{ route('mahasiswa.show', $mhs) }}"
                                       class="btn btn-sm btn-info text-white">Detail</a>
                                    <a href="{{ route('mahasiswa.edit', $mhs) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $mhs) }}"
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
                                <td colspan="4" class="text-center text-muted py-4">
                                    Belum ada data mahasiswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
