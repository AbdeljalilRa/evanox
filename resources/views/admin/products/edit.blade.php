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
                                            id="title" name="title" 
                                            value="{{ old('title', $product->title) }}" required>
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
                                    <!-- Description (WYSIWYG Editor) -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="6">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">
                                            You can style your description (bold, lists, etc). Use the "Horizontal line" button (<strong>Insert horizontal line</strong>) to separate paragraphs visually.<br>
                                            <strong>Note:</strong> All titles/headings will be automatically underlined in the product view.
                                        </small>
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
                                            <div class="alert alert-info mb-2">
                                                <i class="bi bi-file-earmark"></i>
                                                <strong>Current File:</strong> 
                                                <a href="{{ Storage::disk('s3')->temporaryUrl($product->file_path, now()->addMinutes(5)) }}" target="_blank" class="text-decoration-none">
                                                    Download File
                                                </a>
                                            </div>
                                        @else
                                            <div class="alert alert-secondary mb-2">
                                                <i class="bi bi-exclamation-circle"></i> No file uploaded
                                            </div>
                                        @endif

                                        <input type="file"
                                            class="form-control stylish-file @error('file_path') is-invalid @enderror"
                                            id="file_path" name="file_path">
                                        <small class="text-muted">Select a new file to replace the existing one</small>
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
                                    <div class="mb-3">
                                        <label class="form-label">Gallery Images</label>
                                        <div class="row">
                                            @php
                                                $galleryFields = ['images_1', 'images_2', 'images_3', 'images_4'];
                                                $productImages = $product->images()->orderBy('id')->get();
                                            @endphp

                                            @foreach ($galleryFields as $index => $imgField)
                                                @php
                                                    $existingImage = $productImages[$index] ?? null;
                                                @endphp
                                                <div class="col-md-6 col-lg-3 mb-3">
                                                    <div class="card gallery-card shadow-sm">
                                                        <div class="card-body p-2">
                                                            <!-- Existing Image Preview -->
                                                            @if ($existingImage)
                                                                <div class="existing-image-container mb-2" id="existing_{{ $imgField }}">
                                                                    <img src="{{ Storage::disk('s3')->temporaryUrl($existingImage->image_path, now()->addMinutes(5)) }}"
                                                                        alt="Gallery Image {{ $index + 1 }}"
                                                                        class="img-fluid rounded"
                                                                        style="max-height: 150px; width: 100%; object-fit: cover;"
                                                                        loading="lazy">
                                                                </div>
                                                            @endif

                                                            <!-- New Image Preview -->
                                                            <div id="preview_{{ $imgField }}" class="img-preview mb-2"></div>

                                                            <!-- File Input -->
                                                            <div class="input-group mb-2">
                                                                <input type="file"
                                                                    class="form-control stylish-file @error($imgField) is-invalid @enderror"
                                                                    id="{{ $imgField }}" name="{{ $imgField }}"
                                                                    accept="image/*"
                                                                    onchange="previewImageWithProgress(this, 'preview_{{ $imgField }}', 'progress_{{ $imgField }}')">
                                                                <label class="input-group-text" for="{{ $imgField }}">
                                                                    <i class="bi bi-image"></i>
                                                                </label>
                                                            </div>

                                                            <!-- Progress Bar -->
                                                            <div class="progress mb-2" style="height:10px;">
                                                                <div id="progress_{{ $imgField }}" class="progress-bar bg-info"
                                                                    role="progressbar" style="width:0%">0%</div>
                                                            </div>

                                                            <!-- Remove Checkbox -->
                                                            @if ($existingImage)
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" 
                                                                        id="remove_{{ $imgField }}" 
                                                                        name="remove_images[]"
                                                                        value="{{ $existingImage->id }}"
                                                                        onchange="toggleImageRemoval(this, 'existing_{{ $imgField }}', '{{ $imgField }}')">
                                                                    <label class="form-check-label" for="remove_{{ $imgField }}">
                                                                        Remove Image
                                                                    </label>
                                                                </div>
                                                            @endif

                                                            @error($imgField)
                                                                <div class="text-danger small mt-2">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

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
            max-width: 100%;
            max-height: 150px;
            border-radius: 10px;
            box-shadow: 0 0 8px #d1d1d1;
        }

        .stylish-file {
            border: 2px solid #d1e7dd;
        }

        .gallery-card {
            border: 1px solid #e9ecef;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .gallery-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
        }

        .gallery-card.image-removed {
            opacity: 0.5;
            background-color: #f8f9fa;
        }

        .gallery-card.image-removed .existing-image-container {
            text-decoration: line-through;
        }

        .existing-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .input-group .input-group-text {
            background: #f4f6fb;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            cursor: pointer;
        }

        .input-group input[type="file"] {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
    </style>

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'link', '|',
                        'bulletedList', 'numberedList', '|',
                        'blockQuote', 'insertTable', 'horizontalLine', '|',
                        'undo', 'redo'
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });

        // Preview image on change with progress simulation
        function previewImageWithProgress(input, previewId, progressId) {
            let preview = document.getElementById(previewId);
            let progressBar = document.getElementById(progressId);

            if (!input.files || !input.files[0]) return;

            preview.innerHTML = '';
            progressBar.style.width = '0%';
            progressBar.textContent = '0%';

            let reader = new FileReader();

            // Simulate loading progress
            let loaded = 0;
            let total = input.files[0].size;
            let interval = setInterval(function() {
                loaded += total / 20;
                let percentComplete = Math.min(100, Math.round((loaded / total) * 100));
                progressBar.style.width = percentComplete + '%';
                progressBar.textContent = percentComplete + '%';
                if (percentComplete >= 100) {
                    clearInterval(interval);
                    progressBar.textContent = 'Ready!';
                }
            }, 30);

            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('rounded');
                preview.appendChild(img);
            }
            reader.readAsDataURL(input.files[0]);
        }

        // Toggle image removal with visual feedback
        function toggleImageRemoval(checkbox, existingImageId, fieldId) {
            let card = document.getElementById(fieldId).closest('.gallery-card');
            
            if (checkbox.checked) {
                card.classList.add('image-removed');
            } else {
                card.classList.remove('image-removed');
            }
        }

        // S3 Progress Upload for main file
        document.getElementById('file_path').addEventListener('change', function(e) {
            let file = e.target.files[0];
            if (!file) return;

            let form = document.getElementById('productForm');
            let progressBar = document.getElementById('fileProgress');
            progressBar.style.width = '0%';
            progressBar.textContent = '0%';

            let formData = new FormData();
            formData.append('file', file);

            fetch('/api/s3-upload-signed-url', {
                    method: 'POST',
                    body: formData,
                }).then(response => response.json())
                .then(data => {
                    // Upload file to S3 using signed URL
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

            // Fallback progress on submit
            form.addEventListener('submit', function() {
                progressBar.style.width = '100%';
                progressBar.textContent = 'Uploaded!';
            });
        });
    </script>
@endsection

@push('styles')
<style>
    .product-description h1,
    .product-description h2,
    .product-description h3,
    .product-description h4,
    .product-description h5 {
        text-decoration: underline;
    }
</style>
@endpush
