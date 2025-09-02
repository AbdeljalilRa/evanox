@extends('layouts.admin.app')

@section('title', 'Create Product')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Create Product</h4>
                </div>
                <div class="card-body">
                    <form id="productForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Product Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Stock -->
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                        id="stock" name="stock" value="{{ old('stock', 0) }}" required>
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
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                        rows="4" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Discount -->
                                <div class="mb-3">
                                    <label for="discount_percentage" class="form-label">Discount Percentage</label>
                                    <input type="number" step="0.01" class="form-control @error('discount_percentage') is-invalid @enderror"
                                        id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage', 0) }}">
                                    @error('discount_percentage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Main File (Large) -->
                                <div class="mb-3">
                                    <label for="file_path" class="form-label">Main File (Large)</label>
                                    <input type="file" class="form-control @error('file_path') is-invalid @enderror"
                                        id="file_path" name="file_path" required>
                                    <div class="progress mt-2" style="height:20px;">
                                        <div id="fileProgress" class="progress-bar" role="progressbar" style="width:0%">0%</div>
                                    </div>
                                    @error('file_path')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gallery Images -->
                                <div class="mb-3">
                                    <label for="images" class="form-label">Gallery Images</label>
                                    <div id="dropArea" class="border border-dashed p-3 text-center" style="cursor:pointer; background:#f9f9f9;">
                                        Drag & Drop images here or click to select
                                    </div>
                                    <input type="file" class="form-control d-none @error('images.*') is-invalid @enderror"
                                        id="images" name="images[]" accept="image/*" multiple>
                                    <div id="previewImages" class="mt-2 d-flex flex-wrap gap-2"></div>
                                    @error('images.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ==== Drag & Drop Gallery Images ====
    const dropArea = document.getElementById('dropArea');
    const input = document.getElementById('images');
    const preview = document.getElementById('previewImages');

    dropArea.addEventListener('click', () => input.click());

    ['dragenter','dragover','dragleave','drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, e => e.preventDefault());
    });

    ['dragenter','dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => dropArea.classList.add('bg-light'));
    });
    ['dragleave','drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => dropArea.classList.remove('bg-light'));
    });

    dropArea.addEventListener('drop', e => {
        input.files = e.dataTransfer.files;
        showPreview(e.dataTransfer.files);
    });

    input.addEventListener('change', e => showPreview(e.target.files));

    function showPreview(files){
        preview.innerHTML = '';
        Array.from(files).forEach(file => {
            if(!file.type.startsWith('image/')) return;
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '80px';
                img.style.height = '80px';
                img.classList.add('img-thumbnail');
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }

    // ==== AJAX Upload Main File + Submit ====
    const form = document.getElementById('productForm');
    const progressBar = document.getElementById('fileProgress');
    const submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function(e){
        e.preventDefault();
        
        // Disable submit button to prevent multiple submissions
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();

        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        xhr.upload.addEventListener('progress', function(e){
            if(e.lengthComputable){
                const percent = Math.round((e.loaded / e.total) * 100);
                progressBar.style.width = percent+'%';
                progressBar.textContent = percent+'%';
            }
        });

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                try {
                    console.log('Response Status:', xhr.status);
                    console.log('Response Text:', xhr.responseText);
                    
                    if (xhr.status >= 200 && xhr.status < 300) {
                        const response = JSON.parse(xhr.responseText);
                        console.log('Parsed Response:', response);
                        
                        // Show success message
                        const successAlert = document.createElement('div');
                        successAlert.className = 'alert alert-success mt-3';
                        successAlert.textContent = 'Product created successfully! Redirecting...';
                        form.parentNode.insertBefore(successAlert, form.nextSibling);
                        
                        // Redirect after a short delay to show the success message
                        setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                // Fallback to index page if no redirect URL
                                window.location.href = "{{ route('admin.products.index') }}";
                            }
                        }, 1000);
                    } else {
                        // Re-enable submit button on error
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Create Product';
                        
                        // Show error message
                        let errorMessage = 'An error occurred. Please try again.';
                        
                        try {
                            const errorResponse = JSON.parse(xhr.responseText);
                            if (errorResponse.message) {
                                errorMessage = errorResponse.message;
                            } else if (errorResponse.errors) {
                                errorMessage = Object.values(errorResponse.errors).flat().join('<br>');
                            }
                        } catch (e) {
                            console.error('Error parsing error response:', e);
                        }
                        
                        const errorAlert = document.createElement('div');
                        errorAlert.className = 'alert alert-danger mt-3';
                        errorAlert.innerHTML = errorMessage;
                        form.parentNode.insertBefore(errorAlert, form.nextSibling);
                        
                        // Scroll to error message
                        errorAlert.scrollIntoView({ behavior: 'smooth' });
                    }
                } catch (e) {
                    console.error('Error processing response:', e);
                    
                    // Re-enable submit button
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Create Product';
                    
                    // Show error message
                    const errorAlert = document.createElement('div');
                    errorAlert.className = 'alert alert-danger mt-3';
                    errorAlert.textContent = 'Error processing response: ' + e.message;
                    form.parentNode.insertBefore(errorAlert, form.nextSibling);
                }
            }
        };

        xhr.send(formData);
    });
});
</script>
@endsection