@extends('admin.app')
@section('title', 'Manage Classes')
@section('content')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Manage Classes</div>
</div>

<!-- Class count and Add Class button -->
<div class="row g-3 justify-content-end">
    <div class="col-auto">
        <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addClassModal">
            <i class="bi bi-plus-lg me-2"></i>Add Class
        </button>
    </div>
</div>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif


<!-- Classes Table -->
<div class="card mt-4">
    <div class="card-body">
        <div class="table-responsive white-space-nowrap" style="min-height: 500px;">
            <table class="table mb-0 table-stripped" id="example8">
                <thead class="table-light">
                    <tr>
                        <th>Class</th>
                        <th>Stream</th>
                        <th>Class Teacher</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->class }}</td>
                        <td>{{ $class->stream }}</td>
                        <td>{{ $class->class_teacher ?? 'N/A' }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item edit-btn" 
                                        
                                           data-id="{{ $class->id }}" 
                                           data-class="{{ $class->class }}" 
                                           data-stream="{{ $class->stream }}" 
                                           data-teacher="{{ $class->class_teacher ?? '' }}">
                                           <i class="bi bi-pencil-square me-2"></i>Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item delete-btn" data-id="{{ $class->id }}">
                                            <i class="bi bi-trash me-2"></i>Delete
                                        </a>
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

<!-- Add Class Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.add.class') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Class Name</label>
                        <input type="text" name="class" placeholder="Class Name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stream</label>
                        <input type="text" name="stream" placeholder="Class Stream" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Class Teacher</label>
                        <select name="class_teacher" class="form-control" required>
                            <option value="">Select Class Teacher</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Class Modal -->
<div class="modal fade" id="editClassModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.update.class') }}" method="POST" id="editClassForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-class-id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Class Name</label>
                        <input type="text" name="class"placeholder="Class Name" id="edit-class-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stream</label>
                        <input type="text" name="stream"placeholder="Class Stream" id="edit-class-stream" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Class Teacher</label>
                        <select name="class_teacher" id="edit-class-teacher" class="form-control" required>
                            <option value="">Select Class Teacher</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle edit button click
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const className = this.getAttribute('data-class');
                const stream = this.getAttribute('data-stream');
                const teacherId = this.getAttribute('data-teacher');

                document.getElementById('edit-class-id').value = id;
                document.getElementById('edit-class-name').value = className;
                document.getElementById('edit-class-stream').value = stream;

                // Set selected class teacher
                const teacherSelect = document.getElementById('edit-class-teacher');
                teacherSelect.value = teacherId;

                // Set the form action for the edit
                document.getElementById('editClassForm').action = `/admin/update/class`;

                // Show the edit modal
                new bootstrap.Modal(document.getElementById('editClassModal')).show();
            });
        });

        // Handle delete confirmation
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const classId = this.getAttribute('data-id');
                if (confirm('Are you sure you want to delete this class?')) {
                    const form = document.createElement('form');
                    form.action = `/admin/class/delete/${classId}`;
                    form.method = 'POST';
                    form.innerHTML = '@csrf @method("DELETE")';
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>

@endsection
