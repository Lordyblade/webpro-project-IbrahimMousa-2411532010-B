@extends('layouts.mahasiswa')

@section('title', 'Edit Mahasiswa')

@section('content')
    <div class="mb-3">
        <h2 class="text-secondary fw-bold">Edit Data Mahasiswa</h2>
        <p class="text-muted">Perbarui informasi mahasiswa dengan teliti.</p>
    </div>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nim" class="form-label fw-bold">NIM (Nomor Induk Mahasiswa)</label>
            <input type="text" class="form-control text-secondary bg-light" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
        </div>

        <div class="mb-3">
            <label for="name"class="form-label fw-bold">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $mahasiswa->name }}" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label fw-bold">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan" required>
                <option value="Teknik Informatika" {{ $mahasiswa->jurusan == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                <option value="Sistem Informasi" {{ $mahasiswa->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                <option value="Manajemen Informatika" {{ $mahasiswa->jurusan == 'Manajemen Informatika' ? 'selected' : '' }}>Manajemen Informatika</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-secondary px-4 shadow-sm">Update Data</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
        </div>
    </form>
@endsection