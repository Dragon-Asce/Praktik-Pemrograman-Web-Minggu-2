@csrf

<div class="mb-3">
    <label for="kode_mk" class="form-label">Kode Mata Kuliah <span class="text-danger">*</span></label>
    <input type="text" name="kode_mk" id="kode_mk"
           class="form-control @error('kode_mk') is-invalid @enderror"
           value="{{ old('kode_mk', $matakuliah->kode_mk ?? '') }}">
    @error('kode_mk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama_mk" class="form-label">Nama Mata Kuliah <span class="text-danger">*</span></label>
    <input type="text" name="nama_mk" id="nama_mk"
           class="form-control @error('nama_mk') is-invalid @enderror"
           value="{{ old('nama_mk', $matakuliah->nama_mk ?? '') }}">
    @error('nama_mk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sks" class="form-label">SKS <span class="text-danger">*</span></label>
    <input type="number" name="sks" id="sks" min="1" max="8"
           class="form-control @error('sks') is-invalid @enderror"
           value="{{ old('sks', $matakuliah->sks ?? '') }}">
    @error('sks')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
