@extends('layouts.admin.app')

@section('title', 'Show Product')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">{{ $product->title }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5 class="fw-bold">Basic Info</h5>
                                @php
                                    $finalPrice =
                                        $product->price - ($product->price * $product->discount_percentage) / 100;
                                @endphp
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Price:</strong>
                                        {{ number_format($product->price, 2) }} MAD</li>
                                    <li class="list-group-item"><strong>Discount:</strong>
                                        {{ $product->discount_percentage }}%</li>
                                    <li class="list-group-item"><strong>Final Price (after discount):</strong>
                                        {{ number_format($finalPrice, 2) }} MAD</li>
                                    <li class="list-group-item"><strong>Stock:</strong> {{ $product->stock }}</li>
                                    <li class="list-group-item"><strong>Status:</strong>
                                        @if ($product->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item"><strong>Category:</strong> {{ $product->category?->title }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="fw-bold">Description</h5>
                                <div class="bg-light rounded p-3 mb-2 product-description">
                                    {!! $product->description !!}
                                </div>
                                @if($product->whats_inside || $product->perfect_for || $product->format || $product->license)
                                    <div class="bg-light rounded p-3 mb-2 mt-2">
                                        @if($product->whats_inside)
                                        <div class="mb-2">
                                            <strong class="text-primary">What's Inside:</strong><br>
                                            <ul>
                                                @foreach(explode("\n", $product->whats_inside) as $line)
                                                    @if(trim($line) != '')
                                                        <li>{{ $line }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        @if($product->perfect_for)
                                        <div class="mb-2">
                                            <strong class="text-primary">Perfect For:</strong><br>
                                            <span>{{ $product->perfect_for }}</span>
                                        </div>
                                        @endif
                                        @if($product->format)
                                        <div class="mb-2">
                                            <strong class="text-primary">Format:</strong><br>
                                            <span>{{ $product->format }}</span>
                                        </div>
                                        @endif
                                        @if($product->license)
                                        <div class="mb-2">
                                            <strong class="text-primary">License:</strong><br>
                                            <span>{{ $product->license }}</span>
                                        </div>
                                        @endif
                                    </div>
                                @endif
                                @if ($product->file_path)
                                    <div class="mb-2">
                                        <a href="{{ Storage::disk('s3')->url($product->file_path) }}"
                                            class="btn btn-sm btn-outline-info" target="_blank">
                                            <i class="bi bi-cloud-arrow-down"></i> Download Main File
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="fw-bold">Gallery</h5>
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    @if($product->gallery_urls && count($product->gallery_urls) > 0)
                                        @foreach ($product->gallery_urls as $url)
                                            <div class="gallery-img-box text-center">
                                                <img src="{{ $url }}" alt="{{ $product->title }}"
                                                    class="rounded shadow-sm"
                                                    style="max-width:150px; max-height:150px;">
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted">No gallery images available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <a href="{{ route('admin.products.edit', $product->slug) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back to Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .gallery-img-box img {
            border-radius: 10px;
            box-shadow: 0 0 8px #d1d1d1;
        }
        .product-description h2, .product-description h3 {
            color: #222;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            margin-top: 1.5em;
        }
        .product-description p {
            color: #333;
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            margin-bottom: 1em;
        }
        .product-description ul, .product-description ol {
            color: #333;
            margin-left: 2em;
            margin-bottom: 1em;
        }
        .product-description li {
            margin-bottom: 0.3em;
        }
        .product-description strong {
            color: #0d6efd;
        }
    </style>
@endsection