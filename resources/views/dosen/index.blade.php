@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold text-primary">Daftar Dosen</h5>
            <span class="badge bg-primary">{{ $data_dosen->count() }} dosen</span>
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data_dosen as $dosen)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $dosen->nidn }}</td>
                                <td class="align-middle">{{ $dosen->nama }}</td>
                                <td class="align-middle">{{ $dosen->bidang_keahlian }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
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
