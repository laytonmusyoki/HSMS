@extends('admin.app')
@section('title', 'Manage Students')
@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Student</div>
</div>

@if($errors->any())

@foreach($errors->all() as $error)

{{ $error }}

@endforeach


@endif

<div class="card">
    <div class="card-body">
        <!-- Status Bar -->
        <div class="status-bar">
            <div class="step-container">
                <div class="step-dot active"></div>
                <div class="step-label active">Personal Information</div>
            </div>
            <div class="step-line active"></div>
            <div class="step-container">
                <div class="step-dot"></div>
                <div class="step-label">Admission Information</div>
            </div>
            <div class="step-line"></div>
            <div class="step-container">
                <div class="step-dot"></div>
                <div class="step-label">Health Information</div>
            </div>
            <div class="step-line"></div>
            <div class="step-container">
                <div class="step-dot"></div>
                <div class="step-label">Parent/Guardian Information</div>
            </div>
        </div>

        <form id="addStudentForm" action="{{ route('admin.add.studentPost') }}" method="POST">
            @csrf
            <!-- Step 1: Personal Information -->
            <div class="form-step" id="step1">
                <h4>Step 1: Personal Information</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(1)">Next</button>
            </div>

            <!-- Step 2: Admission Information -->
            <div class="form-step" id="step2" style="display:none;">
                <h4>Step 2: Admission Information</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="admission_number" class="form-label">Admission Number</label>
                        <input type="text" class="form-control" id="admission_number" name="admission_number" placeholder="Enter admission number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="class" class="form-label">Class/Grade</label>
                        <select class="form-select" id="class" name="class_id" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="stream" class="form-label">Stream</label>
                        <select class="form-select" id="stream_id" name="stream_id" required>
                            <option value="">Select Stream</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->stream }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="dormitory" class="form-label">Dormitory</label>
                        <select class="form-select" id="dormitory" name="dormitory" required>
                            <option value="">Select Dormitory</option>
                            @foreach($dormitories as $dormitory)
                            <option value="{{ $dormitory->name }}">{{ $dormitory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mt-3" onclick="prevStep(2)">Back</button>
                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(2)">Next</button>
            </div>


            <!-- Step 3: Health Information -->
            <div class="form-step" id="step3" style="display:none;">
                <h4>Step 3: Health Information</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="medical_conditions" class="form-label">Medical Conditions</label>
                        <input type="text" class="form-control" id="medical_conditions" name="medical_conditions" placeholder="Enter medical conditions">
                    </div>
                    <div class="col-md-6">
                        <label for="allergies" class="form-label">Allergies</label>
                        <input type="text" class="form-control" id="allergies" name="allergies" placeholder="Enter allergies">
                    </div>
                    <div class="col-md-6">
                        <label for="emergency_contact" class="form-label">Emergency Contact Person</label>
                        <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="Enter emergency contact name" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mt-3" onclick="prevStep(3)">Back</button>
                <button type="button" class="btn btn-primary mt-3" onclick="nextStep(3)">Next</button>
            </div>

            <!-- Step 4: Parent/Guardian Information -->
            <div class="form-step" id="step4" style="display:none;">
                <h4>Step 4: Parent/Guardian Information</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="parent_name" class="form-label">Parent Name</label>
                        <input type="text" class="form-control" id="parent_name" name="parent_name" placeholder="Enter parent's name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="relationship" class="form-label">Relationship to Student</label>
                        <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter relationship" required>
                    </div>
                    <div class="col-md-6">
                        <label for="parent_phone" class="form-label">Parent Phone Number</label>
                        <input type="tel" class="form-control" id="parent_phone" name="parent_phone" pattern="[0-9]{10}" placeholder="e.g., 0712345678" required>
                    </div>
                    <div class="col-md-6">
                        <label for="parent_email" class="form-label">Parent Email</label>
                        <input type="email" class="form-control" id="parent_email" name="parent_email" placeholder="e.g., parent@gmail.com" required>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mt-3" onclick="prevStep(4)">Back</button>
                <button type="submit" class="btn btn-primary mt-3">Add Student</button>
            </div>
        </form>
    </div>
</div>

<!-- CSS for Status Bar -->
<style>
    .status-bar {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .step-container {
        flex: 1;
        text-align: center;
    }
    .step-dot {
        width: 20px;
        height: 20px;
        background-color: gray;
        border-radius: 50%;
        margin: 0 auto;
    }
    .step-dot.active {
        background-color: green;
    }
    .step-line {
        flex: 1;
        height: 2px;
        background-color: gray;
    }
    .step-line.active {
        background-color: green;
    }
</style>

<!-- JavaScript for Step Navigation -->
<script>
    let currentStep = 1;

    function showStep(step) {
        const steps = document.querySelectorAll('.form-step');
        steps.forEach((stepElement, index) => {
            stepElement.style.display = (index + 1 === step) ? 'block' : 'none';
        });

        const dots = document.querySelectorAll('.step-dot');
        const lines = document.querySelectorAll('.step-line');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index < step);
        });
        lines.forEach((line, index) => {
            line.classList.toggle('active', index < step - 1);
        });
    }

    function nextStep(step) {
        if (step < 4) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep(step) {
        if (step > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        showStep(currentStep);
    });
</script>

@endsection
