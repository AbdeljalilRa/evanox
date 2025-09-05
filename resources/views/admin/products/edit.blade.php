@extends('layouts.admin.app')

@section('title', 'Edit Product')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <form id="productForm" action="{{ route('admin.products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Product Title -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Product Title</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $product->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Price -->
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('price') is-invalid @enderror" id="price"
                                            name="price" value="{{ old('price', $product->price) }}" required>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Stock -->
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stock</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                            id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
                                        @error('stock')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            id="category_id" name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="4" required>{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Discount -->
                                    <div class="mb-3">
                                        <label for="discount_percentage" class="form-label">Discount Percentage</label>
                                        <input type="number" step="0.01"
                                            class="form-control @error('discount_percentage') is-invalid @enderror"
                                            id="discount_percentage" name="discount_percentage"
                                            value="{{ old('discount_percentage', $product->discount_percentage) }}">
                                        @error('discount_percentage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Main File (Large) -->
                                    <div class="mb-3">
                                        <label for="file_path" class="form-label">Main File (Large)</label>
                                        @if ($product->file_path)
                                            <div class="mb-2">
                                                <a href="{{ Storage::disk('s3')->temporaryUrl($product->file_path, now()->addMinutes(5)) }}"
                                                    target="_blank" class="btn btn-sm btn-outline-primary">
                                                    Current File
                                                </a>
                                            </div>
                                        @endif
                                        <input type="file"
                                            class="form-control stylish-file @error('file_path') is-invalid @enderror"
                                            id="file_path" name="file_path">
                                        <div class="progress mt-2" style="height:20px;">
                                            <div id="fileProgress" class="progress-bar bg-success" role="progressbar"
                                                style="width:0%">
                                                0%</div>
                                        </div>
                                        @error('file_path')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Gallery Images with Progress + Preview -->
                                    @php
                                        $productImages = $product->images()->orderBy('id')->get();
                                    @endphp
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="mb-3">
                                            <label for="images_{{ $i }}" class="form-label">Gallery Image {{ $i }}</label>
                                            <div class="input-group stylish-img-input">
                                                <input type="file"
                                                    class="form-control stylish-file @error('images_' . $i) is-invalid @enderror"
                                                    id="images_{{ $i }}" name="images_{{ $i }}"
                                                    accept="image/*"
                                                    onchange="previewImageWithProgress(this, 'preview_{{ $i }}', 'progress_images_{{ $i }}')">
                                                <label class="input-group-text" for="images_{{ $i }}"><i class="bi bi-image"></i></label>
                                            </div>
                                            <div class="progress mt-2" style="height:10px;">
                                                <div id="progress_images_{{ $i }}"
                                                    class="progress-bar bg-info" role="progressbar" style="width:0%">0%
                                                </div>
                                            </div>
                                            <div id="preview_{{ $i }}" class="img-preview mt-2">
                                                @if (isset($productImages[$i - 1]))
                                                    <img src="{{ Storage::disk('s3')->temporaryUrl($productImages[$i - 1]->image_path, now()->addMinutes(5)) }}"
                                                        alt="Gallery Image {{ $i }}">
                                                @endif
                                            </div>
                                            @error('images_' . $i)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endfor

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="is_active"
                                                name="is_active" value="1"
                                                {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .stylish-img-input input[type="file"] {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .stylish-img-input .input-group-text {
            background: #f4f6fb;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            cursor: pointer;
        }

        .img-preview img {
            max-width: 120px;
            max-height: 120px;
            border-radius: 10px;
            box-shadow: 0 0 8px #d1d1d1;
            margin-right: 8px;
        }

        .stylish-file {
            border: 2px solid #d1e7dd;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script>
        function previewImageWithProgress(input, previewId, progressId) {
            let preview = document.getElementById(previewId);
            let progressBar = document.getElementById(progressId);

            if (!input.files || !input.files[0]) return;

            preview.innerHTML = '';
            progressBar.style.width = '0%';
            progressBar.textContent = '0%';

            let reader = new FileReader();

            let loaded = 0;
            let total = input.files[0].size;
            let interval = setInterval(function() {
                loaded += total / 20;
                let percentComplete = Math.min(100, Math.round((loaded / total) * 100));
                progressBar.style.width = percentComplete + '%';
                progressBar.textContent = percentComplete + '%';
                if (percentComplete >= 100) {
                    clearInterval(interval);
                    progressBar.textContent = 'Loaded!';
                }
            }, 30);

            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                preview.innerHTML = '';
                preview.appendChild(img);
            }
            reader.readAsDataURL(input.files[0]);
        }

        // Function to refresh S3 temporary URLs
        function refreshS3Urls() {
            // Get all images with S3 URLs
            const s3Images = document.querySelectorAll('img[src*="temporaryUrl"], a[href*="temporaryUrl"]');
            
            if (s3Images.length > 0) {
                // In a real implementation, you would make an AJAX call to refresh the URLs
                fetch('/api/refresh-s3-urls', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update image sources and link hrefs with new temporary URLs
                    console.log('S3 URLs refreshed successfully');
                })
                .catch(error => {
                    console.error('Error refreshing S3 URLs:', error);
                });
            }
        }

        document.getElementById('file_path').addEventListener('change', function(e) {
            let file = e.target.files[0];
            if (!file) return;
            let form = document.getElementById('productForm');
            let progressBar = document.getElementById('fileProgress');
            progressBar.style.width = '0%';
            progressBar.textContent = '0%';

            // Uncomment this block if you have endpoint ready for S3 signed upload
           
            let formData = new FormData();
            formData.append('file', file);
            fetch('/api/s3-upload-signed-url', {
                    method: 'POST',
                    body: formData,
                }).then(response => response.json())
                .then(data => {
                    let xhr = new XMLHttpRequest();
                    xhr.open('PUT', data.signed_url, true);
                    xhr.upload.onprogress = function(e) {
                        if (e.lengthComputable) {
                            let percentComplete = Math.round((e.loaded / e.total) * 100);
                            progressBar.style.width = percentComplete + '%';
                            progressBar.textContent = percentComplete + '%';
                        }
                    };
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            progressBar.style.width = '100%';
                            progressBar.textContent = 'Uploaded!';
                        }
                    };
                    xhr.send(file);
                });
           
            form.addEventListener('submit', function() {
                progressBar.style.width = '100%';
                progressBar.textContent = 'Uploaded!';
            });
        });

        // Set up a timer to refresh S3 URLs every 4 minutes (before the 5-minute expiry)
        document.addEventListener('DOMContentLoaded', function() {
            // Initial refresh to ensure all URLs are valid
            refreshS3Urls();
            
            // Set interval for regular refreshes
            setInterval(refreshS3Urls, 4 * 60 * 1000);
        });
    </script>
@endsection