@extends('admin.app')

@section('title', 'Manage Teachers')

@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Manage Teachers</div>
</div>
<!-- End Breadcrumb -->

<div class="row g-3 justify-content-end">
    <div class="col-auto">
        <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                <i class="bi bi-plus-lg me-2"></i>Add Teacher
            </button>
        </div>
    </div>
</div><!-- End Row -->

<div class="card mt-4">
    <div class="card-body">
        <div class="product-table">
            <div class="table-responsive white-space-nowrap" style="min-height: 500px !important;">
                <table class="table align-middle" id="example8">
                    <thead>
                        <tr>
                            <th>Teacher</th>
                            <th>Subject(s)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ implode(', ', explode(',', $teacher->subjects)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item edit-btn" 
                                               data-id="{{ $teacher->id }}" 
                                               data-name="{{ $teacher->name }}" 
                                               data-phone="{{ optional($users->firstWhere('name', $teacher->name))->phone }}" 
                                               data-email="{{ optional($users->firstWhere('name', $teacher->name))->email }}"
                                               data-subjects="{{ $teacher->subjects }}" 
                                               href="#" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#editTeacherModal">
                                                <i class="bi bi-pencil-square me-2"></i>Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.delete.teacher', $teacher->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger delete">
                                                    <i class="bi bi-trash me-2"></i>Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Teacher Modal -->
<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.add.teacher') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="teacherName" class="form-label">Teacher Name</label>
                                <input type="text" name="name" class="form-control" id="teacherName" placeholder="Enter Teacher Name" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="teacherPhone" class="form-label">Teacher Phone</label>
                                <input type="text" name="phone" class="form-control" id="teacherPhone" placeholder="Enter Teacher Phone" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="teacherEmail" class="form-label">Teacher Email</label>
                                <input type="email" name="email" class="form-control" id="teacherEmail" placeholder="Enter Teacher Email" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="teacherPassword" class="form-label">Teacher Password</label>
                                <input type="password" name="password" class="form-control" id="teacherPassword" placeholder="Enter Teacher Password" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subjects</label>
                        <div class="row">
                            @foreach($subjects as $subject)
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="{{ $subject->subject }}" id="subject{{ $subject->id }}">
                                    <label class="form-check-label" for="subject{{ $subject->id }}">
                                        {{ $subject->subject }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Teacher Modal -->
<div class="modal fade" id="editTeacherModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.update.teacher') }}" method="POST" id="editTeacherForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editTeacherId">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="editTeacherName" class="form-label">Teacher Name</label>
                                <input type="text" name="name" class="form-control" id="editTeacherName" placeholder="Enter Teacher Name" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="editTeacherPhone" class="form-label">Teacher Phone</label>
                                <input type="text" name="phone" class="form-control" id="editTeacherPhone" placeholder="Enter Teacher Phone">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="editTeacherEmail" class="form-label">Teacher Email</label>
                                <input type="email" name="email" class="form-control" id="editTeacherEmail" placeholder="Enter Teacher Email">
                            </div>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subjects</label>
                        <div class="row">
                            @foreach($subjects as $subject)
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="{{ $subject->subject }}" id="editSubject{{ $subject->id }}">
                                    <label class="form-check-label" for="editSubject{{ $subject->id }}">
                                        {{ $subject->subject }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const teacherId = this.getAttribute('data-id');
                const teacherName = this.getAttribute('data-name');
                const teacherPhone = this.getAttribute('data-phone');
                const teacherEmail = this.getAttribute('data-email');
                const subjects = this.getAttribute('data-subjects').split(',');

                document.getElementById('editTeacherId').value = teacherId;
                document.getElementById('editTeacherName').value = teacherName;
                document.getElementById('editTeacherPhone').value = teacherPhone || '';
                document.getElementById('editTeacherEmail').value = teacherEmail || '';

                document.querySelectorAll('#editTeacherModal .form-check-input').forEach(input => {
                    input.checked = subjects.includes(input.value);
                });
            });
        });
    });
</script>

@endsection
