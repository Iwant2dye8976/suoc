<?php

namespace App\Http\Controllers;

use App\Models\Class_;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('class')->orderBy('updated_at','desc')->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Class_::all();
        return view('students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'student_number'=>'required|string|max:20',
            'email'=>'required|email|max:100',
            'class_id'=>'required|exists:classes,id',
            'date_of_birth'=>'required|date',
            'status'=>'required|in:Trial,Enrolled,Dropped',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $classes = Class_::all();
        return view('students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'=>'required|string|max:50',
            'last_name'=>'required|string|max:50',
            'student_number'=>'required|string|max:20',
            'email'=>'required|email|max:100',
            'class_id'=>'required|exists:classes,id',
            'date_of_birth'=>'required|date',
            'status'=>'required|in:Trial,Enrolled,Dropped',
        ]);
        $student = Student::find($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Delete Successfully.');
    }
}
