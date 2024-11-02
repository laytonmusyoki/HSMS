@extends('admin.app')
@section('title', 'Manage Students')
@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Manage Students</div>
</div>

<!-- Student count and Add Student button -->
<div class="row g-3 justify-content-end">
    <div class="col-auto">
        <a href="{{ route('admin.add.student') }}" class="btn btn-primary mb-2">Add student</a>
    </div>
</div>

<!-- Student Table -->
<div class="table-responsive">
    <table class="table table-striped" id="example2">
        <thead>
            <tr>
                <th>Admission No.</th>
                <th>Full Name</th>
                <th>Class</th>
                <th>Stream</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through students to display them -->
            @foreach($students as $student)
            <tr>
                <td>{{ $student->admission_number }}</td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->classes->class ?? 'na' }}</td>
                <td>{{ $student->classes->stream ?? 'na'}}</td>
                <td>{{ $student->parent_email }}</td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $student->id }}">
                        Edit
                    </button>
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>

            
            @endforeach
        </tbody>
    </table>
</div>



@endsection
