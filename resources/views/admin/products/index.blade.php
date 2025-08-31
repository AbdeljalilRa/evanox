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
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{ $product->file_path }}" alt="{{ $product->title }}" 
                                     class="img-thumbnail" style="width: 50px;">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <form action="{{ route('admin.products.toggle-status', $product) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm 
                                        {{ $product->is_active ? 'btn-success' : 'btn-secondary' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.products.show', $product) }}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" 
                                      method="POST" class="d-inline"
                                      id="delete-form-{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" 
                                            onclick="confirmDelete('delete-form-{{ $product->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection