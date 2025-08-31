@extends('layouts.admin.app')

@section('title', 'Product Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Product Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5>Main Image</h5>
                                @if($product->file_path)
                                    <img src="{{ $product->file_path }}" alt="{{ $product->title }}" 
                                         class="img-fluid rounded" style="max-height: 300px;">
                                @else
                                    <p class="text-muted">No main image available</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <h5>Gallery Images</h5>
                                <div class="row g-2">
                                    @forelse($product->images as $image)
                                        <div class="col-4">
                                            <img src="{{ $image->image_path }}" alt="Gallery image" 
                                                 class="img-fluid rounded">
                                        </div>
                                    @empty
                                        <p class="text-muted">No gallery images available</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th style="width: 200px;">Title</th>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $product->slug }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td>{{ $product->discount_percentage }}%</td>
                                </tr>
                                <tr>
                                    <th>Final Price</th>
                                    <td>${{ number_format($product->getDiscountedPrice(), 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>{{ $product->stock }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }}">
                                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $product->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $product->updated_at->format('M d, Y H:i') }}</td>
                                </tr>
                            </table>

                            <div class="mt-4">
                                <h5>Description</h5>
                                <p class="text-muted">{{ $product->description }}</p>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to List</a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">Edit Product</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" 
                                      class="d-inline" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" 
                                            onclick="confirmDelete('delete-form')">
                                        Delete Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection