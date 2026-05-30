<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Eager loading untuk menghindari N+1 problem
        $students = Student::with(['major', 'subjects'])->get();
        return view('students.index', compact('students'));
    }

    public function show($id)
    {
        $student = Student::with(['major', 'subjects'])->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function create()
    {
        $majors = Major::all();
        $subjects = Subject::all();
        return view('students.create', compact('majors', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:students',
            'name' => 'required',
            'address' => 'required',
            'major_id' => 'required|exists:majors,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student = Student::create(
        $request->only(['nim', 'name', 'address', 'major_id'])
    );

        $student->subjects()->attach($request->subjects);

    return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $student = Student::with('subjects')->findOrFail($id);
        $majors = Major::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'majors', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'nim' => 'required|unique:students,nim,' . $student->id,
            'name' => 'required',
            'address' => 'required',
            'major_id' => 'required|exists:majors,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $student->update($request->only(['nim', 'name', 'address', 'major_id']));        
        $student->subjects()->sync($request->subjects);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->subjects()->detach(); // Remove all subject relationships
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

   public function latihan(Request $request)
{
    // Query 1, Semua mahasiswa beserta jurusan dan mata kuliahnya
    $students = Student::with(['major', 'subjects'])->get();

    // Query 2, Jurusan dengan mahasiswa terbanyak
    $majorTerbanyak = Major::withCount('students')
        ->orderBy('students_count', 'desc')
        ->first();

    // Query 3, Mata kuliah yang diambil mahasiswa tertentu (misal mahasiswa dengan ID 1)
    $firstStudent = Student::first();
    $selectedStudent = Student::with('subjects')
    ->find($request->student_id ?? Student::first()->id);   

    // Query 4, Total SKS yang Diambil Setiap Mahasiswa
    $totalSksMahasiswa = Student::with('subjects')->get();

    return view('students.latihan', compact(
        'students',
        'majorTerbanyak',
        'selectedStudent',
        'totalSksMahasiswa'
    ));
}
}