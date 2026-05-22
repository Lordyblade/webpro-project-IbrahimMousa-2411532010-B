@extends('layouts.mahasiswa')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="mb-3">
        <h2 class="text-secondary fw-bold">Tambah Data Mahasiswa</h2>
        <p class="text-muted">Silakan isi formulir di bawah ini dengan lengkap.</p>
    </div>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="nim" class="form-label fw-bold">NIM (Nomor Induk Mahasiswa)</label>
            <input type="text" class="form-control text-secondary" id="nim" name="nim" placeholder="Contoh: 220101001" required>
        </div>

        <div class="mb-3">
            <label for="name"class="form-label fw-bold">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label fw-bold">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan" required>
                <option value="" disabled selected>-- Pilih Jurusan --</option>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-secondary shadow-sm">Simpan Data</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
        </div>
    </form>
@endsection