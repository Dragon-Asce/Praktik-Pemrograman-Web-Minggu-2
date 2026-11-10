@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold text-primary">Daftar Dosen</h5>
            <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="18%">NIDN</th>
                            <th>Nama Lengkap</th>
                            <th>Bidang Keahlian</th>
                            <th width="25%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data_dosen as $dosen)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $dosen->nidn }}</td>
                                <td class="align-middle">{{ $dosen->nama }}</td>
                                <td class="align-middle">{{ $dosen->bidang_keahlian }}</td>
                                <td class="text-center">
                                    <a href="{{ route('dosen.show', $dosen) }}"
                                       class="btn btn-sm btn-info text-white">Detail</a>
                                    <a href="{{ route('dosen.edit', $dosen) }}"
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('dosen.destroy', $dosen) }}"
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
                                    Belum ada data dosen.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
