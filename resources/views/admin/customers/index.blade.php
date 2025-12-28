@extends('layouts.admin.app')

@section('title', 'Users Management')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <!-- Header -->
                    <div class="card-header d-flex justify-content-between align-items-center p-3">
                        <h4 class="card-title flex-grow-1 mb-0">All Users List</h4>
                        <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus me-1"></i> Add User
                        </a>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="py-3" style="min-width: 50px;">ID</th>
                                        <th class="py-3" style="min-width: 150px;">Name</th>
                                        <th class="py-3" style="min-width: 200px;">Email</th>
                                        <th class="py-3" style="min-width: 120px;">Role</th>
                                        <th class="py-3" style="min-width: 120px;">Phone</th>
                                        <th class="py-3 text-center" style="min-width: 150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role === 'admin')
                                                    <span class="badge bg-danger">Admin</span>
                                                @else
                                                    <span class="badge bg-success">Customer</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->telephone ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">

                                                    <!-- Show Details -->
                                                    <a href="{{ route('admin.customers.show', $user->slug) }}"
                                                        class="btn btn-soft-info btn-sm" data-bs-toggle="tooltip"
                                                        title="View Details">
                                                        <iconify-icon icon="mdi:account-circle-outline"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>

                                                    <!-- Edit User -->
                                                    <a href="{{ route('admin.customers.edit', $user->slug) }}"
                                                        class="btn btn-soft-primary btn-sm" data-bs-toggle="tooltip"
                                                        title="Edit User">
                                                        <iconify-icon icon="solar:pen-2-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                    </a>

                                                    <!-- Delete User -->
                                                    <form id="delete-form-{{ $user->slug }}"
                                                        action="{{ route('admin.customers.destroy', $user->slug) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-soft-danger btn-sm"
                                                            data-bs-toggle="tooltip" title="Delete User"
                                                            onclick="confirmDelete('delete-form-{{ $user->slug }}')">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                                class="align-middle fs-18"></iconify-icon>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="bx bx-user text-muted" style="font-size: 40px;"></i>
                                                    <h5 class="mt-2">No users found</h5>
                                                    <p class="text-muted">Start by adding a new user</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if ($users->hasPages())
                            <div class="d-flex justify-content-end mt-4">
                                {{ $users->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
@endsection
