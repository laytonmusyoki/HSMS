<?php

namespace App\Http\Controllers;

use App\Models\DepartmentData;
use App\Models\DepartmentModel;
use App\Models\Subjects;
use App\Models\TeacherModel;
use App\Models\Teachers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=Subjects::all();
        $teachers=Teachers::all();
        $users=User::all();

        return view("admin.teachers.list", compact("subjects","teachers","users"));
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
    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15', // Add validation for phone
        'email' => 'required|email|unique:users,email', // Validate email and ensure it’s unique in the users table
        'password' => 'required|string|min:6', // Add validation for password
        'subjects' => 'required|array', // Ensure 'subjects' is an array
    ]);

    // Check if a teacher with the same name already exists
    $existingTeacher = Teachers::where('name', $request->name)->first();
    if ($existingTeacher) {
        return redirect()->back()->with('error', 'Teacher already exists');
    }

    // Create a new Teacher record
    $teacher = new Teachers();
    $teacher->name = $request->name;
    // Store subjects as a comma-separated string
    $teacher->subjects = implode(',', $request->subjects); // Join selected subjects into a string
    $teacher->save(); // Save the teacher record

    // Create a new User record
    $user = new User();
    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->email = $request->email;
    $user->role = 'teacher';
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->back()->with('success', 'Teacher added successfully.');
}


    
    public function show(Teachers $teachers)
    {
        //
    }

    public function edit(Teachers $teachers)
    {
        //
    }

    public function update(Request $request)
{
    $request->validate([
        'id' => 'required|exists:teachers,id',
        'name' => 'required|string|max:255',
        'subjects' => 'required|array',
    ]);

    $teacher = Teachers::findOrFail($request->id);
    $teacher->name = $request->name;
    $teacher->subjects = implode(',', $request->subjects); // Join subjects into a string
    $teacher->save();

    $user=User::where('name', $request->name)->first();
    if($user){
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role= 'teacher';
        $user->save();
    }
    else{
        $user=new User();
        $user->name = $request->name;
        $user->phone= $request->phone;
        $user->email = $request->email;
        $user->role='teacher';
        $user->password=Hash::make('teacher');
        $user->save();
    }

    return redirect()->back()->with('success', 'Teacher updated successfully.');
}

    public function destroy($id){
        $teacher = Teachers::findOrFail($id);
        $teacher->delete();

        return redirect()->back()->with('success', 'Teacher deleted successfully.');
    }

    public function departments(){
        $teachers = Teachers::all();
        $departments=DepartmentData::all();
        $teacher_department=DepartmentModel::all();
        return view('admin.departments.list_departments', compact('teachers','departments','teacher_department'));
    }

    public function assignDepartment(Request $request){
        $request->validate([
            'name'=> 'required',
            'teacher_id'=>'required'
        ]);
        $teacher_exists=DepartmentModel::where('teacher_id',$request->teacher_id)->exists();
        if($teacher_exists){
            return redirect()->back()->with('error','Teacher can only have one department');
        }
        $department=new DepartmentModel();
        $department->name = $request->name;
        $department->teacher_id=$request->teacher_id;
        $department->save();
        return redirect()->back()->with('success','Teacher assigned successfully');
    }

    public function teacherDepartmentUpdate(Request $request){
        $request->validate([
            'id'=>['required'],
            'name'=> 'required',
            'teacher_id'=>'required'
        ]);
        $recordExists=DepartmentModel::find( $request->id );

        $teacher_exists=DepartmentModel::where('teacher_id',$request->teacher_id)->exists();
        if($teacher_exists){
            return redirect()->back()->with('error','Teacher can only have one department');
        }

        if($recordExists){
            $recordExists->name = $request->name;
            $recordExists->teacher_id=$request->teacher_id;
            $recordExists->save();
            return redirect()->back()->with('success','Teacher assigned successfully');
        }
        return redirect()->back()->with('error','Record not found');



    }
    public function teacherDepartmentDelete(Request $request, $id){
        $department=DepartmentModel::findOrFail($id);
        $department->delete();
        return redirect()->back()->with('success','Teacher un Assigned from the department');
    }


}
