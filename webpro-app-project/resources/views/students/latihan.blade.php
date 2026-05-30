@extends('layouts.app')

@section('content')

<h1>Latihan 1 - Query dengan Relationship</h1>
<h3 class="mt-5 mb-3">1. Semua Mahasiswa Beserta Jurusan dan Mata Kuliahnya</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Mata Kuliah</th>
        </tr>
    </thead>

    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->nim }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->major->name }}</td>
            <td>
                @foreach($student->subjects as $subject)
                    <span class="badge bg-secondary">
                        {{ $subject->name }}
                    </span>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3 class="mt-5 mb-3">2. Jurusan dengan Mahasiswa Terbanyak</h3>
<div class="alert alert-info">
    <strong>{{ $majorTerbanyak->name }}</strong>
    memiliki
    <strong>{{ $majorTerbanyak->students_count }}</strong>
    mahasiswa.
</div>

<h3 class="mt-5 mb-3">3. Mata Kuliah yang Diambil Mahasiswa Tertentu</h3>
<form method="GET" action="{{ url('/latihan') }}">
    <div class="mb-3">
        <label class="form-label">Pilih Mahasiswa</label>

        <select name="student_id"
                class="form-control"
                onchange="this.form.submit()">

            @foreach($students as $student)
                <option value="{{ $student->id }}"
                    {{ $selectedStudent && $selectedStudent->id == $student->id ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach

        </select>
    </div>
</form>

<div class="card">
    <div class="card-header">
        Mata Kuliah {{ $selectedStudent->name }}
    </div>

    <div class="card-body">
        <ul>
            @foreach($selectedStudent->subjects as $subject)
                <li>
                    {{ $subject->name }}
                    ({{ $subject->sks }} SKS)
                </li>
            @endforeach
        </ul>
    </div>
</div>

<h3 class="mt-5 mb-3">4. Total SKS yang Diambil Setiap Mahasiswa</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Mahasiswa</th>
            <th>Total SKS</th>
        </tr>
    </thead>

    <tbody>
        @foreach($totalSksMahasiswa as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->subjects->sum('sks') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection