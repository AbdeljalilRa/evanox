@extends('layouts.admin.app')

@section('title', 'Products')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3">Products</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>

        <!-- Products Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @if($product->gallery_urls && count($product->gallery_urls) > 0)
                                            @foreach ($product->gallery_urls as $url)
                                                <img src="{{ $url }}" alt="{{ $product->title }}"
                                                    class="img-thumbnail me-1" style="width: 50px;">
                                            @endforeach
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category->title ?? 'N/A' }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <form action="{{ route('admin.products.toggle-status', $product) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm {{ $product->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- View Button -->
                                            <a href="{{ route('admin.products.show', $product) }}"
                                                class="btn btn-light btn-sm">
                                                <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.products.edit', $product) }}"
                                                class="btn btn-soft-primary btn-sm">
                                                <iconify-icon icon="solar:pen-2-broken"
                                                    class="align-middle fs-18"></iconify-icon>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                                class="d-inline" id="delete-form-{{ $product->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-soft-danger btn-sm"
                                                    onclick="confirmDelete('delete-form-{{ $product->id }}')">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken"
                                                        class="align-middle fs-18"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination with Bootstrap styling -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal Script -->
    <script>
        function confirmDelete(formId) {
            if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
                document.getElementById(formId).submit();
            }
        }
    </script>
@endsection