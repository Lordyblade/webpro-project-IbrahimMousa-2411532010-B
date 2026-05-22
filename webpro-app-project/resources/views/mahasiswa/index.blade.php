@extends('layouts.mahasiswa')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-secondary fw-bold">Daftar Mahasiswa</h2>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-secondary shadow-sm">+ Tambah Mahasiswa</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-secondary">
                <tr>
                    <th width="5%">No</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $index => $mhs)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="fw-bold text-secondary">{{ $mhs->nim }}</td>
                    <td>{{ $mhs->name}}</td>
                    <td>{{ $mhs->jurusan }}</td>
                    <td>{{ $mhs->email}}</td>
                    <td class="text-center">
                        <div class="btn-group gap-2" role="group">
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-end">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data mahasiswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection