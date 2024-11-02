<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Subjects;
use App\Models\TeacherAssigning;
use App\Models\Teachers;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classes = Classes::all();
        $teachers=Teachers::all();
        return view("admin.classes.index", compact("classes","teachers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class"=> "required",
            "stream"=> "required",
            "class_teacher"=> "required",
        ]);

        $teacher=Classes::where('class_teacher',$request->class_teacher)->first();
        $stream=Classes::where('stream',$request->stream)->first();
        if($teacher){
            return redirect()->back()->with("error","Teacher can only have one class");
        }
        else if($stream){
            return redirect()->back()->with("error","Stream already exists");
        }
        $classData=new Classes();
        $classData->class= $request->class;
        $classData->stream= $request->stream;
        $classData->class_teacher= $request->class_teacher;
        $classData->save();
        return redirect()->back()->with("success","Class added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        $request->validate([
            'id'=>'required',
            "class"=> "required",
            "stream"=> "required",
            "class_teacher"=> "required",
        ]);

        $teacher=Classes::where('class_teacher',$request->class_teacher)->first();
        $stream=Classes::where('stream',$request->stream)->first();
        if($teacher){
            return redirect()->back()->with("error","Teacher can only have one class");
        }
        else if($stream){
            return redirect()->back()->with("error","Stream already exists");
        }
        $updateClass=Classes::find($request->id);
        $updateClass->class= $request->class;
        $updateClass->stream= $request->stream;
        $updateClass->class_teacher= $request->class_teacher;
        $updateClass->save();

        return redirect()->back()->with("success","Class updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $classes=Classes::find($id);
        $classes->delete();
        return redirect()->back()->with("success","Class deleted successfully");
    }

    public function classSubjects(){
        $classes=Classes::all();
        $teachers=Teachers::all();
        $subjects=Subjects::all();
        return view("admin.classes.subjects",compact("classes","teachers","subjects"));
    }

    // app/Http/Controllers/ClassTeacherSubjectController.php


    // Method to assign teachers to subjects in a class
    public function assignTeachers(Request $request) {
        // Validate incoming request data
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'teacher_ids' => 'required|array',
            'teacher_ids.*' => 'exists:teachers,id', // Validate each teacher ID
        ]);
    
        // Loop through each subject and assign the selected teacher
        foreach ($request->teacher_ids as $subjectId => $teacherId) {
            $classCount = TeacherAssigning::where('teacher_id', $teacherId)->count();
            
            
            $teacher = Teachers::find($teacherId);
    
            if ($classCount >= 5) {
                return redirect()->back()->with('error', "Teacher {$teacher->name} cannot be assigned to more than 5 Streams.");
            }
    
            // Assign teacher if they are under the limit
            TeacherAssigning::updateOrCreate(
                [
                    'class_id' => $request->class_id,
                    'subject_id' => $subjectId,
                ],
                [
                    'teacher_id' => $teacherId,
                ]
            );
        }
        return redirect()->back()->with('success', 'Teachers assigned successfully!');
    }

    //my classes
    public function myClasses(){
        $user=auth()->user()->name;
        $teacher=Teachers::where('name',$user)->first();
        $classes=TeacherAssigning::where('teacher_id', $teacher->id)->get();
        $students=[
            'admission_number'=>['1090','2010','3133','88876','65646','4343','4434'],
            'name'=>['Layton','Matheka','Musyoki','Kalistar','Mathesh'],
        ];
        return view('admin.classes.myclasses',compact('classes','students'));
    }
    
}


