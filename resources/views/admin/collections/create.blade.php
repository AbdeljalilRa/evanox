@extends('layouts.admin.app')

@section('title', 'Create Collection')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="mb-0 text-white">Create Collection</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.collections.store') }}" method="POST" enctype="multipart/form-data" id="collectionForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Collection Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Collection Title</label>
                                    <input type="text" name="title" id="title" 
                                        class="form-control @error('title') is-invalid @enderror" 
                                        value="{{ old('title') }}" required>
                                    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <!-- Main Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Main Image</label>
                                    <input type="file" name="image" id="image" 
                                        class="form-control @error('image') is-invalid @enderror" 
                                        accept="image/*" required>
                                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="6" 
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Products Multi-Select -->
                                <div class="mb-3">
                                    <label for="products" class="form-label">Select Products <span class="text-danger">*</span></label>
                                    <select name="products[]" id="products" class="form-select @error('products') is-invalid @enderror" multiple required data-placeholder="Choose products">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" {{ in_array($product->id, old('products', [])) ? 'selected' : '' }}>{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('products')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                </div>

                                <!-- Status -->
                                <div class="mb-3 form-check form-switch mt-4">
                                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ old('is_active') ? 'checked' : 'checked' }}>
                                    <label for="is_active" class="form-check-label">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('admin.collections.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Collection</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- CKEditor 5 & Select2 Dependencies (Correct Order) -->
<!-- ============================================================ -->

<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 CSS + Bootstrap 5 Theme -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<!-- ============================================================ -->
<!-- Initialize CKEditor & Select2 with Proper Error Handling -->
<!-- ============================================================ -->
<script>
(function() {
    'use strict';

    // Store editor instances globally to prevent re-initialization
    window.collectionEditors = {
        description: null
    };

    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', initializeEditors, { once: true });

    /**
     * Initialize CKEditor and Select2 with conflict detection
     */
    function initializeEditors() {
        initializeCKEditor();
        initializeSelect2();
        setupFormSubmission();
    }

    /**
     * Initialize CKEditor 5 for description textarea
     */
    function initializeCKEditor() {
        const descriptionElement = document.querySelector('#description');
        
        if (!descriptionElement) {
            console.warn('CKEditor: Description textarea not found');
            return;
        }

        // Check if already initialized
        if (window.collectionEditors.description) {
            console.warn('CKEditor: Already initialized, skipping...');
            return;
        }

        ClassicEditor
            .create(descriptionElement, {
                toolbar: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    'undo',
                    'redo'
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2' },
                    ]
                }
            })
            .then(function(editor) {
                window.collectionEditors.description = editor;
                console.log('CKEditor initialized successfully');
            })
            .catch(function(error) {
                console.error('CKEditor initialization error:', error);
            });
    }

    /**
     * Initialize Select2 with Bootstrap 5 theme
     */
    function initializeSelect2() {
        const productsSelect = document.querySelector('#products');
        
        if (!productsSelect) {
            console.warn('Select2: Products select not found');
            return;
        }

        // Check if jQuery is available
        if (typeof jQuery === 'undefined') {
            console.error('Select2 requires jQuery. jQuery not loaded!');
            return;
        }

        const $select = jQuery(productsSelect);

        // Check if already initialized
        if ($select.data('select2')) {
            console.warn('Select2: Already initialized, skipping...');
            return;
        }

        // Initialize Select2
        $select.select2({
            placeholder: 'Click to select products (click again to deselect)',
            allowClear: true,
            width: '100%',
            theme: 'bootstrap-5',
            closeOnSelect: false, // Keep open for multiple selections
            containerCssClass: 'form-select-lg',
            language: {
                noResults: function() {
                    return 'No products found';
                },
                searching: function() {
                    return 'Searching...';
                }
            }
        });

        console.log('Select2 initialized successfully');
    }

    /**
     * Setup form submission to sync CKEditor data
     */
    function setupFormSubmission() {
        const form = document.querySelector('#collectionForm');
        
        if (!form) {
            console.warn('Form not found');
            return;
        }

        form.addEventListener('submit', function(e) {
            // Sync CKEditor content before submission
            if (window.collectionEditors.description) {
                try {
                    const editorData = window.collectionEditors.description.getData();
                    document.querySelector('#description').value = editorData;
                    console.log('CKEditor data synced to textarea');
                } catch (error) {
                    console.error('Error syncing CKEditor data:', error);
                }
            }
        });
    }

    // Optional: Expose a public method to reinitialize if needed
    window.reinitializeCollectionEditors = function() {
        window.collectionEditors = { description: null };
        initializeEditors();
    };
})();
</script>
@endsection
