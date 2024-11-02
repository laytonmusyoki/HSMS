@extends('admin.app')

@section('title', 'Manage Departments')

@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Manage Departments</div>
</div>
<!-- End Breadcrumb -->

<div class="row g-3 justify-content-end">
    <div class="col-auto">
        <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-primary px-4 btn-sm" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                <i class="bi bi-plus-lg me-2"></i>Assign Teacher to Department
            </button>
        </div>
    </div>
</div><!-- End Row -->

<!-- Department Filter Tabs -->
<ul class="nav nav-tabs mt-4" id="departmentTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" onclick="filterDepartments('all', this)" type="button">All Departments</button>
    </li>
    @foreach($departments as $department)
    <li class="nav-item" role="presentation">
        <button class="nav-link" onclick="filterDepartments('{{ $department->name }}', this)" type="button">
            {{ $department->name }}
        </button>
    </li>
    @endforeach
</ul>

<div class="card mt-4">
    <div class="card-body">
        <div class="product-table">
            <div class="table-responsive white-space-nowrap" style="min-height: 500px !important;">
                <table class="table align-middle" id="example8">
                    <thead class="table-light">
                        <tr>
                            <th>Department(s)</th>
                            <th>Teacher</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="departmentTableBody">
                        @foreach($teacher_department as $teacher_department)
                        <tr data-department="{{ $teacher_department->name }}">
                            <td>{{ $teacher_department->name }}</td>
                            <td>{{ $teacher_department->teacher->name }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item edit-btn" 
                                               href="#" 
                                               data-id="{{ $teacher_department->id }}" 
                                               data-department="{{ $teacher_department->name }}" 
                                               data-teacher="{{ $teacher_department->teacher->id }}" 
                                               data-bs-toggle="modal" 
                                               data-bs-target="#editTeacherModal">
                                                <i class="bi bi-pencil-square me-2"></i>Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.delete.teacherDepartment', $teacher_department->id) }}" method="POST" style="display:inline;">
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

<!-- Assign Teacher to Department Modal -->
<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Teacher to Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.assign.department') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="form-label">Department</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="name" class="form-select" id="">
                                @foreach($departments as $department)
                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teachers</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="teacher_id" class="form-select" id="">
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
            <form action="{{ route('admin.assign.update.department') }}" method="POST">
                @csrf
                <!-- Hidden field for the teacher_department ID -->
                <input type="hidden" name="id" id="editTeacherDepartmentId">
                
                <div class="modal-body">
                    <label class="form-label">Department</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="name" class="form-select" id="editDepartmentSelect">
                                @foreach($departments as $department)
                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teachers</label>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="teacher_id" class="form-select" id="editTeacherSelect">
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
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

<script>
    // Function to filter rows by department and highlight the active tab
    function filterDepartments(department, element) {
        const rows = document.querySelectorAll('#departmentTableBody tr');
        
        rows.forEach(row => {
            const rowDepartment = row.getAttribute('data-department');
            if (department === 'all' || rowDepartment === department) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        // Remove active class from all tabs
        document.querySelectorAll('#departmentTabs .nav-link').forEach(tab => {
            tab.classList.remove('active');
        });

        // Add active class to the clicked tab
        element.classList.add('active');
    }

    // Load edit modal with data
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const teacherDepartmentId = this.getAttribute('data-id');
                const departmentName = this.getAttribute('data-department');
                const teacherId = this.getAttribute('data-teacher');

                document.querySelector('#editTeacherDepartmentId').value = teacherDepartmentId;
                document.querySelector('#editDepartmentSelect').value = departmentName;
                document.querySelector('#editTeacherSelect').value = teacherId;

                $('#editTeacherModal').modal('show');
            });
        });
    });
</script>

<style>
    .nav-tabs .nav-link.active {
        background-color: #007bff; /* Change to your preferred color */
        color: white; /* Change text color if needed */
    }
</style>

@endsection
