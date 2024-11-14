<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/user/login',[AuthController::class,'login'])->name('user.login');
Route::post('/user/login',[AuthController::class,'loginUser'])->name('user.loginUser');
Route::get('/user/register',[AuthController::class,'register'])->name('user.register');
Route::post('/user/registerUser',[AuthController::class,'registerUser'])->name('user.registerUser');
Route::get('/user/forgot',[ForgotPasswordController::class,'forgotPassword'])->name('user.forgot');
Route::get('/user/logout',[AuthController::class,'logout'])->name('user.logout');

Route::get('/user/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
    Route::middleware(['role:Super Admin'])->group(function () {
    Route::get('/admin/users',[AdminDashboardController::class,'users'])->name('admin.users');
    Route::get('/admin/permissions',[PermissionController::class,'permissions'])->name('admin.permissions');
    Route::post('/admin/addPermission',[PermissionController::class,'addPermission'])->name('admin.addPermission');
    Route::get('/admin/roles',[RolesController::class,'roles'])->name('admin.roles');
    Route::post('/admin/roles/add',[RolesController::class,'store'])->name('admin.roles.store');
    Route::put('/admin/roles/update/{id}',[RolesController::class,'update'])->name('admin.roles.update');
    Route::delete('/admin/roles/delete/{id}',[RolesController::class,'destroy'])->name('admin.roles.destroy');
    Route::put('/admin/users/{id}/updateRoles', [RolesController::class, 'updateRoles']);
    });

    //classes
    Route::get('/admin/classes',[ClassesController::class,'index'])->name('admin.classes');
    Route::post('/admin/add/class',[ClassesController::class,'store'])->name('admin.add.class');
    Route::put('/admin/update/class',[ClassesController::class,'update'])->name('admin.update.class');
    Route::delete('/admin/class/delete/{id}',[ClassesController::class,'destroy'])->name('admin.delete.class');
    Route::get('/admin/subjects',[ClassesController::class,'classSubjects'])->name('admin.subjects');
    Route::post('/admin/assign/teachers',[ClassesController::class,'assignTeachers'])->name('admin.assignTeachers');
    Route::get('/admin/myClasses',[ClassesController::class,'myClasses'])->name('admin.myClasses');
    Route::get('/admin/stream',[ClassesController::class,'stream'])->name('admin.stream');
    Route::get('/admin/myStudents',[ClassesController::class,'myStudents'])->name('admin.myStudents');

    //teachers
    Route::get('/admin/teachers',[TeachersController::class,'index'])->name('admin.teachers');
    Route::post('/admin/add/teacher',[TeachersController::class,'store'])->name('admin.add.teacher');
    Route::put('/admin/update/teacher',[TeachersController::class,'update'])->name('admin.update.teacher');
    Route::delete('/admin/delete/teacher/{id}',[TeachersController::class,'destroy'])->name('admin.delete.teacher');
    //departments
    Route::get('/admin/departments',[TeachersController::class,'departments'])->name('admin.teacher.departments');
    Route::post('/admin/assign/department',[TeachersController::class,'assignDepartment'])->name('admin.assign.department');
    Route::delete('/admin/delete/teacherDepartment/{id}',[TeachersController::class,'teacherDepartmentDelete'])->name('admin.delete.teacherDepartment');
    Route::post('/admin/update/teacherDepartment',[TeachersController::class,'teacherDepartmentUpdate'])->name('admin.assign.update.department');

    //students
    Route::get('/admin/students',[StudentsController::class,'index'])->name('admin.students');
    Route::get('/admin/add/student',[StudentsController::class,'addStudent'])->name('admin.add.student');
    Route::post('/admin/add/studentPOST',[StudentsController::class,'addStudentPost'])->name('admin.add.studentPost');

});

Route::get('/admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::post('/admin/login',[AdminAuthController::class,'loginAdmin'])->name('admin.loginAdmin');
Route::get('/admin/forgot',[ForgotPasswordController::class,'forgotPassword'])->name('admin.forgot');
Route::get('/admin/logout',[AdminAuthController::class,'logout'])->name('admin.logout');

