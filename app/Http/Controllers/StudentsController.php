<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\DormitoryModel;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $students = Students::all();
        return view("admin.students.all_list",compact("students"));
    }

    public function addStudent(){
        $classes=Classes::all();
        $dormitories=DormitoryModel::all();
        return view("admin.students.add",compact("classes","dormitories"));
    }


    public function addStudentPost(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'admission_number' => 'required|string|unique:students',
            'class_id' => 'required|exists:classes,id',
            'stream_id' => 'required|exists:classes,id',
            'dormitory' => 'required|string',
            'medical_conditions' => 'nullable|string',
            'allergies' => 'nullable|string',
            'emergency_contact' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:15',
            'parent_email' => 'required|email|max:255',
        ]);

        Students::create($validatedData);
        return redirect()->route('admin.students')->with('success', 'Student added successfully.');
    }

}
