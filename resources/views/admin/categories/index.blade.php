@extends('layouts.admin.app')

@section('title', 'Categories Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h4 class="card-title flex-grow-1 mb-0">All Categories List</h4>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i> Add Category
                    </a>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3" style="min-width: 300px;">Categories</th>
                                    <th class="py-3" style="min-width: 200px;">Subtitle</th>
                                    <th class="py-3" style="min-width: 120px;">Created Date</th>
                                    <th class="py-3 text-center" style="min-width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-primary rounded">
                                                            <i class="bx bx-folder font-size-20"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-15 mb-0">{{ $category->title }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-wrap">{{ $category->sub_title ?: '-' }}</td>
                                        <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if(!$category->deleted_at)
                                                <div class="d-flex justify-content-center gap-2">
                                                   
                                                    <a href="{{ route('admin.categories.edit', $category->slug) }}" 
                                                       class="btn btn-soft-primary btn-sm"
                                                       data-bs-toggle="tooltip"
                                                       title="Edit">
                                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a>
                                                    <form id="delete-form-{{ $category->id }}" 
                                                          action="{{ route('admin.categories.destroy', $category->slug) }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" 
                                                                class="btn btn-soft-danger btn-sm"
                                                                data-bs-toggle="tooltip"
                                                                title="Delete"
                                                                onclick="confirmDelete('delete-form-{{ $category->id }}')">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bx bx-folder-open text-muted" style="font-size: 40px;"></i>
                                                <h5 class="mt-2">No categories found</h5>
                                                <p class="text-muted">Start by adding a new category</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($categories->hasPages())
                        <div class="d-flex justify-content-end mt-4">
                            {{ $categories->links('vendor.pagination.bootstrap-5') }}
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
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endsection