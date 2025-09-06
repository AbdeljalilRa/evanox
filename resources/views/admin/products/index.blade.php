@extends('layouts.admin.app')

@section('title', 'Products Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h4 class="card-title flex-grow-1 mb-0">All Products List</h4>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i> Add Product
                    </a>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3" style="min-width: 120px;">Image</th>
                                    <th class="py-3" style="min-width: 300px;">Title</th>
                                    <th class="py-3" style="min-width: 200px;">Category</th>
                                    <th class="py-3" style="min-width: 120px;">Price</th>
                                    <th class="py-3" style="min-width: 100px;">Stock</th>
                                    <th class="py-3" style="min-width: 120px;">Status</th>
                                    <th class="py-3 text-center" style="min-width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        @if($product->gallery_urls && count($product->gallery_urls) > 0)
                                                            <span class="avatar-title bg-light rounded">
                                                                <img src="{{ $product->gallery_urls[0] }}" alt="{{ $product->title }}" class="img-fluid rounded" style="width:40px; height:40px;">
                                                            </span>
                                                        @else
                                                            <span class="avatar-title bg-light text-muted rounded">
                                                                <i class="bx bx-image-alt font-size-20"></i>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="font-size-15 mb-0">{{ $product->title }}</h5>
                                        </td>
                                        <td class="text-wrap">{{ $product->category->title ?? '-' }}</td>
                                        <td>${{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <form action="{{ route('admin.products.toggle-status', $product) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="btn btn-sm {{ $product->is_active ? 'btn-success' : 'btn-secondary' }}"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ $product->is_active ? 'Set inactive' : 'Set active' }}">
                                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <!-- View Button -->
                                                <a href="{{ route('admin.products.show', $product) }}"
                                                    class="btn btn-light btn-sm"
                                                    data-bs-toggle="tooltip"
                                                    title="View">
                                                    <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.products.edit', $product) }}"
                                                    class="btn btn-soft-primary btn-sm"
                                                    data-bs-toggle="tooltip"
                                                    title="Edit">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                <!-- Delete Button -->
                                                <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                            class="btn btn-soft-danger btn-sm"
                                                            data-bs-toggle="tooltip"
                                                            title="Delete"
                                                            onclick="confirmDelete('delete-form-{{ $product->id }}')">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bx bx-box text-muted" style="font-size: 40px;"></i>
                                                <h5 class="mt-2">No products found</h5>
                                                <p class="text-muted">Start by adding a new product</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($products->hasPages())
                        <div class="d-flex justify-content-end mt-4">
                            {{ $products->links('vendor.pagination.bootstrap-5') }}
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

    function confirmDelete(formId) {
        if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
            document.getElementById(formId).submit();
        }
    }
</script>
@endsection