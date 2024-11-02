@extends('admin.app')

@section('title', 'Manage Classes and Streams')

@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Manage Classes and Streams</div>
</div>
<!-- End Breadcrumb -->
@if(session('error'))

<div class="alert alert-danger">
    {{session('error')}}
</div>

@endif

<!-- Tabs for filtering classes -->
<ul class="nav nav-tabs mb-4" id="classTabs" style="border: 1px solid #ddd; border-radius: .375rem;">
    <li class="nav-item">
        <a class="nav-link active" href="#" data-filter="All Classes" 
           style="border: 1px solid #28a745; border-radius: .375rem 0 0 .375rem; background-color: #28a745; color: #fff;">
           All Classes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-filter="Form One" style="border: 1px solid transparent;">Form One</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-filter="Form Two" style="border: 1px solid transparent;">Form Two</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-filter="Form Three" style="border: 1px solid transparent;">Form Three</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-filter="Form Four" style="border: 1px solid transparent; border-radius: 0 .375rem .375rem 0;">Form Four</a>
    </li>
</ul>

<div class="card mt-4">
    <div class="card-body">
        <div class="table-responsive white-space-nowrap">
            <table class="table align-middle" id="example2">
                <thead class="table-light">
                    <tr>
                        <th>Class</th>
                        <th>Stream</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="classTableBody">
                    @foreach($classes as $class)
                        <tr class="class-row" data-class="{{ $class->class }}">
                            <td>{{ $class->class }}</td>
                            <td>{{ $class->stream }}</td>
                            <td class="text-center"> <!-- Align the buttons to the right -->
                                <!-- Assign Teachers Button -->
                                <button class="btn btn-sm btn-primary assign-teachers" 
                                        data-class="{{ $class->id }}" 
                                        data-assigned="{{ json_encode($class->teacherAssignments->keyBy('subject_id')->map(function($assignment) {
                                            return $assignment->teacher_id;
                                        })) }}" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#assignTeacherModal">
                                    <i class="bi bi-person-plus me-2"></i>Assign Teachers
                                </button>

                                <!-- Status Button for Assigned/Not Assigned -->
                                @php
                                    $assigned = $class->teacherAssignments->count() > 0; // Check if teachers are assigned
                                @endphp
                                <button class="btn btn-sm {{ $assigned ? 'btn-success' : 'btn-danger' }} ms-2">
                                    {{ $assigned ? 'Teachers Assigned' : 'No Teachers Assigned' }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Assign Teacher Modal -->
<div class="modal fade" id="assignTeacherModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Teachers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.assignTeachers') }}" method="POST">
                @csrf
                <input type="hidden" name="class_id" id="assignClassId">
                
                <div class="modal-body">
                    <div class="row">
                        @foreach($subjects as $subject)
                        <div class="col-md-4 mb-3">
                            <label class="form-label">{{ $subject->subject }}</label>
                            <select name="teacher_ids[{{ $subject->id }}]" required class="form-select" id="teacher-select-{{ $subject->id }}">
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                    @if(in_array($subject->subject, explode(',', $teacher->subjects)))
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Populate the assign teacher modal with the selected class ID and prefill assigned teachers
    document.querySelectorAll('.assign-teachers').forEach(item => {
        item.addEventListener('click', function() {
            const classId = this.getAttribute('data-class');
            const assignedTeachers = JSON.parse(this.getAttribute('data-assigned'));
            document.getElementById('assignClassId').value = classId;

            // Reset all selects to the default
            @foreach($subjects as $subject)
                document.getElementById('teacher-select-{{ $subject->id }}').value = ""; // Resetting the select field
            @endforeach

            // Prefill the select inputs with assigned teachers
            Object.entries(assignedTeachers).forEach(([subjectId, teacherId]) => {
                const selectInput = document.getElementById(`teacher-select-${subjectId}`);
                if (selectInput) {
                    selectInput.value = teacherId; // Set the value of the select input
                }
            });
        });
    });

    // Filter classes by selected tab
    document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function(event) {
            event.preventDefault();
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.class-row').forEach(row => {
                // Show all classes if "All Classes" is selected, otherwise filter by class
                if (filter === 'All Classes' || row.getAttribute('data-class') === filter) {
                    row.style.display = ''; // Show row
                } else {
                    row.style.display = 'none'; // Hide row
                }
            });

            // Update active tab
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
                link.style.backgroundColor = ''; // Reset background color
                link.style.color = ''; // Reset text color
                link.style.border = '1px solid transparent'; // Reset border
            });
            this.classList.add('active');
            this.style.backgroundColor = '#28a745'; // Set success color for active tab
            this.style.color = '#fff'; // Change text color to white
            this.style.border = '1px solid #28a745'; // Set border for active tab
        });
    });
</script>

@endsection
