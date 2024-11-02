@extends('admin.app')

@section('title', 'Users')

@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">  
        Users
        <a href="">All ({{$users->count()}})</a>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <div class="product-table">
            <div class="table-responsive white-space-nowrap" style="min-height: 500px !important;">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="">Name</th>
                            <th class="">Email</th>
                            <th class="">Role</th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                        <tr>
                            <td>
                                <p class="">{{$item->first_name ?? 'N/A'}} {{$item->last_name ?? 'N/A'}}</p>
                            </td>
                            <td>
                                <p class="">{{$item->email}}</p>
                            </td>
                            <td>
                                <p class="">{{ implode(', ', $item->roles->pluck('name')->toArray()) }}</p>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-filter dropdown-toggle dropdown-toggle-nocaret"
                                            type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item edit-btn" data-id="{{ $item->id }}" href="javascript:void(0);" 
                                               data-bs-toggle="modal" data-bs-target="#editUserModal" 
                                               data-roles="{{ json_encode($item->roles->pluck('id')->toArray()) }}">
                                                <i class="bi bi-pencil-square me-2"></i>Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item delete-btn" data-id="{{ $item->id }}" href="javascript:void(0);">
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
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editUserForm" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user_id" id="user_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User Roles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="roles">Assign Roles</label>
                        <div class="form-check">
                            <input type="checkbox" id="selectAll" class="form-check-input">
                            <label class="form-check-label" for="selectAll">Select All</label>
                        </div>
                        <div id="roles">
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="form-check-input" id="role{{ $role->id }}">
                                    <label class="form-check-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Pre-fill modal with user data on 'Edit' click
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const userRoles = JSON.parse(this.getAttribute('data-roles'));

                // Set form action and user ID
                document.getElementById('editUserForm').action = `/admin/users/${userId}/updateRoles`;
                document.getElementById('user_id').value = userId;

                // Pre-select the roles in the checkboxes
                const checkboxes = document.querySelectorAll('#roles input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = userRoles.includes(parseInt(checkbox.value));
                });

                // Reset the Select All checkbox
                const selectAllCheckbox = document.getElementById('selectAll');
                selectAllCheckbox.checked = checkboxes.length === [...checkboxes].filter(checkbox => checkbox.checked).length;
            });
        });

        // Select All checkbox functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('#roles input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Handle delete action
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.action = `/admin/users/delete/${userId}`;
                        form.method = 'POST';

                        form.innerHTML = `
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                        `;

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
<!-- Include jQuery and SweetAlert -->

@endsection
