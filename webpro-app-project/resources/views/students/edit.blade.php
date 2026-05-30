@extends('layouts.app')

@section('content')

<h2>Edit Mahasiswa</h2>

<div class="card">
    <div class="card-body">
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text"
                   class="form-control @error('nim') is-invalid @enderror"
                   id="nim"
                   name="nim"
                   value="{{ old('nim', $student->nim) }}">
            @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   id="name"
                   name="name"
                   value="{{ old('name', $student->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control @error('address') is-invalid @enderror"
                      id="address"
                      name="address"
                      rows="3">{{ old('address', $student->address) }}</textarea>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="major_id" class="form-label">Jurusan</label>
            <select class="form-control @error('major_id') is-invalid @enderror"
                    id="major_id"
                    name="major_id">
                @foreach($majors as $major)
                    <option value="{{ $major->id }}"
                        {{ old('major_id', $student->major_id) == $major->id ? 'selected' : '' }}>
                        {{ $major->name }}
                    </option>
                @endforeach
            </select>
            @error('major_id')
                <div class="invalid-feedback"> {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mata Kuliah</label>
            @foreach($subjects as $subject)
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="subjects[]"
                           value="{{ $subject->id }}"
                           id="subject{{ $subject->id }}"
                           {{ in_array(
                                $subject->id, old('subjects', $student->subjects->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="subject{{ $subject->id }}"> {{ $subject->name }} ({{ $subject->sks }} SKS)
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</div>
@endsection
