<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Students::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('students.create',compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'register_number' => 'required|unique:students',
        ]);

        Students::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Students $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Students $student)
    {
        $departments = Department::all();
        return view('students.edit', compact('student', 'departments'));
    }

    public function update(Request $request, Students $student)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'register_number' => 'required|unique:students,register_number,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Students $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
