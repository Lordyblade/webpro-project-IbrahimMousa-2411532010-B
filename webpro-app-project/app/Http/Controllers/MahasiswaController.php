<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}