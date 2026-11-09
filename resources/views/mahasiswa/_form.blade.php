@csrf

<div class="mb-3">
    <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
    <input type="text" name="nim" id="nim"
           class="form-control @error('nim') is-invalid @enderror"
           value="{{ old('nim', $mahasiswa->nim ?? '') }}">
    @error('nim')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
    <input type="text" name="nama" id="nama"
           class="form-control @error('nama') is-invalid @enderror"
           value="{{ old('nama', $mahasiswa->nama ?? '') }}">
    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="prodi" class="form-label">Prodi <span class="text-danger">*</span></label>
    <input type="text" name="prodi" id="prodi"
           class="form-control @error('prodi') is-invalid @enderror"
           value="{{ old('prodi', $mahasiswa->prodi ?? '') }}">
    @error('prodi')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="angkatan" class="form-label">Angkatan <span class="text-danger">*</span></label>
    <input type="text" name="angkatan" id="angkatan"
           class="form-control @error('angkatan') is-invalid @enderror"
           value="{{ old('angkatan', $mahasiswa->angkatan ?? '') }}">
    @error('angkatan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" rows="3"
              class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $mahasiswa->alamat ?? '') }}</textarea>
    @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
