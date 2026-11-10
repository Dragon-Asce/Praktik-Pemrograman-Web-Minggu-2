@csrf

<div class="mb-3">
    <label for="nidn" class="form-label">NIDN <span class="text-danger">*</span></label>
    <input type="text" name="nidn" id="nidn"
           class="form-control @error('nidn') is-invalid @enderror"
           value="{{ old('nidn', $dosen->nidn ?? '') }}">
    @error('nidn')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
    <input type="text" name="nama" id="nama"
           class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $dosen->nama ?? '') }}">
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="bidang_keahlian" class="form-label">Bidang Keahlian <span class="text-danger">*</span></label>
    <input type="text" name="bidang_keahlian" id="bidang_keahlian"
           class="form-control @error('bidang_keahlian') is-invalid @enderror"
           value="{{ old('bidang_keahlian', $dosen->bidang_keahlian ?? '') }}">
    @error('bidang_keahlian')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('dosen.index') }}" class="btn btn-secondary">Batal</a>
