<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required|string|max:255',
        ]);

        Department::create([
            'department' => $request->department,
        ]);

        return redirect()->route('departments.create')->with('success', 'Department added successfully.');
    }
}
