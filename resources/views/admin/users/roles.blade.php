@extends('admin.app')
@section('title', 'Roles')
@section('content') 

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">
        Roles
    </div>
</div>
<!--end breadcrumb-->

<div class="product-count d-flex align-items-center gap-3 gap-lg-4 mb-4 fw-medium flex-wrap font-text1">
    <a href="javascript:;"><span class="me-1">All</span><span class="text-secondary">
       ( {{ $roles->count() }} ) 
    </span></a>
</div>

<div class="row g-3">
    <div class="col-auto flex-grow-1 overflow-auto">
        <div class="btn-group position-static">
        </div>
    </div>
    <div class="col-auto">
        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal"><i class="bi bi-plus-lg me-2"></i>Add Role</button>
        </div>
    </div>
</div><!--end row-->

<div class="card mt-4">
    <div class="card-body">
        <div class="product-table">
            <div class="table-responsive white-space-nowrap" style="min-height: 500px !important;">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->permissions->count() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <!-- Edit Button Opens Edit Modal -->
                                        <li><a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editRoleModal-{{ $item->id }}"><i class="bi bi-pencil-square me-2"></i>Edit</a></li>
                                        <li><a class="dropdown-item delete-btn" data-id="{{ $item->id }}" href="javascript:void(0);"><i class="bi bi-trash me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Role Modal for Each Role -->
                        <div class="modal fade" id="editRoleModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Role - {{ $item->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.roles.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Role Name Input -->
                                            <div class="mb-3">
                                                <label for="roleName-{{ $item->id }}" class="form-label">Role Name</label>
                                                <input type="text" name="name" class="form-control" id="roleName-{{ $item->id }}" value="{{ $item->name }}" required>
                                            </div>

                                            <!-- Permissions Checkbox List -->
                                            <div class="form-group">
                                                <label>Permissions</label>
                                                <div>
                                                    <input type="checkbox" id="selectAll-{{ $item->id }}" onclick="toggleAllPermissions({{ $item->id }}, this)">
                                                    <label for="selectAll-{{ $item->id }}">Select All</label>
                                                </div>
                                                <div class="row">
                                                    @foreach ($permissions as $permission)
                                                    <div class="col-lg-6">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="permission{{ $permission->id }}-{{ $item->id }}" 
                                                                @if($item->permissions->contains($permission->id)) checked @endif>
                                                            <label class="form-check-label" for="permission{{ $permission->id }}-{{ $item->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-end">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Role Modal -->
<div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Role Name Input -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Role Name</label>
                        <input type="text" name="name" class="form-control" id="category" placeholder="Enter Role name">
                    </div>

                    <!-- Permissions Checkbox List -->
                    <div class="form-group">
                        <label for="permissions">Permissions</label>
                        <div>
                            <input type="checkbox" id="selectAll" onclick="toggleAll(this)">
                            <label for="selectAll">Select All</label>
                        </div>
                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="permission{{ $permission->id }}">
                                        <label class="form-check-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
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

<!-- JavaScript for Select All Checkboxes -->
<script>
function toggleAll(source) {
    checkboxes = document.getElementsByName('permissions[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = source.checked;
    }
}

function toggleAllPermissions(roleId, source) {
    let checkboxes = document.querySelectorAll(`#editRoleModal-${roleId} input[name='permissions[]']`);
    checkboxes.forEach(checkbox => {
        checkbox.checked = source.checked;
    });
}
</script>

@endsection
