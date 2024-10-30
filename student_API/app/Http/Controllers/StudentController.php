<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

    // Create a new student
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'jurusan' => 'required|string|max:100'
        ]);

        $student = Student::create($validatedData);
        return response()->json($student, 201);
    }

    // Get a single student
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student, 200);
    }

    // Update a student
    public function update($id, Request $request)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'jurusan' => 'required|string|max:100'
        ]);

        $student->update($validatedData);
        return response()->json($student, 200);
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(null, 204);
    }
}
