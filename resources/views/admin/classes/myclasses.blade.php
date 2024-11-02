@extends('admin.app')
@section('title', 'My Classes')
@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">My Classes</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a></li>
                <li class="breadcrumb-item active" aria-current="page">@auth {{ auth()->user()->name }} @endauth</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Teacher's Classes Overview Cards -->
<div class="row row-cols-1 row-cols-xl-4">
    @foreach($classes as $class)
    <div class="col">
        <div class="card border-primary border-bottom rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0 fs-6" style="font-weight: bold">{{ $class->classes->class }}</p>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#viewDetailsModal-{{ $class->id }}">View Details</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#recordExamModal-{{ $class->id }}">Record Exams</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-3">
                    <p><strong>Stream:</strong> {{ $class->classes->stream }}</p>
                    <p><strong>Subject:</strong> {{ $class->subjects->subject }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- View Details Modal for Each Class -->
    <div class="modal fade" id="viewDetailsModal-{{ $class->id }}" tabindex="-1" aria-labelledby="viewDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDetailsLabel">Subject Details for {{ $class->subjects->subject }} - {{ $class->classes->class }} {{ $class->classes->stream }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Subject:</strong> {{ $class->subjects->subject }}</p>
                    <p><strong>Class & Stream:</strong> {{ $class->classes->class }} - {{ $class->classes->stream }}</p>

                    <p><strong>Teacher:</strong> {{ auth()->user()->name }}</p>

                    <h6>Students Enrolled</h6>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Admission Number</th>
                                <th>Student Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($class->students as $student)
                            <tr>
                                <td>{{ $student->admission_number }}</td>
                                <td>{{ $student->name }}</td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>

                    <h6>Subject Schedule</h6>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($class->schedule->where('subject_id', $class->subjects->id) as $schedule)
                            <tr>
                                <td>{{ $schedule->day }}</td>
                                <td>{{ $schedule->time }}</td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>

                    <h6>Recent Assessments</h6>
                    <p>Average Performance: {{ $class->average_performance ?? 'N/A' }}%</p>
                    <p>Latest Test Score: {{ $class->latest_test_score ?? 'N/A' }}%</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Record Exams Modal for Each Class -->
    <div class="modal fade" id="recordExamModal-{{ $class->id }}" tabindex="-1" aria-labelledby="recordExamLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="recordExamLabel">Record Exam Marks for {{ $class->subjects->subject }} - {{ $class->classes->class }} {{ $class->classes->stream }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Exam Type Selection -->
                        <div class="mb-3">
                            <label for="examType" class="form-label">Select Exam Type</label>
                            <select id="examType" name="exam_type" class="form-select" required>
                                <option value="">Choose an option</option>
                                <optgroup label="Term 1">
                                    <option value="term1_opening">Opening Exam</option>
                                    <option value="term1_midterm">Mid Term Exam</option>
                                    <option value="term1_endterm">End Term Exam</option>
                                </optgroup>
                                <optgroup label="Term 2">
                                    <option value="term2_opening">Opening Exam</option>
                                    <option value="term2_midterm">Mid Term Exam</option>
                                    <option value="term2_endterm">End Term Exam</option>
                                </optgroup>
                                <optgroup label="Term 3">
                                    <option value="term3_opening">Opening Exam</option>
                                    <option value="term3_midterm">Mid Term Exam</option>
                                    <option value="term3_endyear">End Year Exam</option>
                                </optgroup>
                            </select>
                        </div>

                        <!-- Scrollable Section for Student Marks -->
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Admission Number</th>
                                        <th>Student Name</th>
                                        <th>Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->admission_number ?? 'n/a' }}</td>
                                        <td>{{ $student->name ?? 'n/a' }}</td>
                                        <td>
                                            <input type="number" name="" class="form-control" min="0" max="100" placeholder="Enter marks" required>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Marks</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- End row -->

@endsection
