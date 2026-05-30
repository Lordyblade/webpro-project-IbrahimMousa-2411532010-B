@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail Mahasiswa</h2>

<a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
</div>
<div class="card">
    <div class="card-body">
    <table class="table">
        <tr>
            <th width="25%">NIM</th>
            <td>{{ $student->nim }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $student->name }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $student->address }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $student->major->name }}</td>
        </tr>
        <tr>
            <th>Mata Kuliah</th>
            <td>
                @foreach($student->subjects as $subject)
                    <span class="badge bg-secondary me-1">
                        {{ $subject->name }} ({{ $subject->sks }} SKS)
                    </span>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Total SKS</th>
            <td>{{ $student->subjects->sum('sks') }}</td>
        </tr>
    </table>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
</div>
</div>
@endsection
