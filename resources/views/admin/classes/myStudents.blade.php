@extends('admin.app')

@section('title', 'Manage Teachers')

@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">My Students</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $is_classTeacher->class  }} | {{ $is_classTeacher->stream  }}</li>
            </ol>
        </nav>
    </div>
</div>


<div class="card mt-4">
    <div class="card-body">
        <div class="product-table">
            <div class="table-responsive white-space-nowrap" style="min-height: 500px !important;">
                <table class="table align-middle" id="example8">
                    <thead>
                        <tr>
                            <th width="10%">Adm No.</th>
                            <th width="23%">Full Name</th>
                            <th>Teacher</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->admission_number }}</td>
                            <td>{{ $student->fullName() }}</td>
                            <td>{{ $student->first_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection