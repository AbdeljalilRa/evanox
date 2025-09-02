@extends('layouts.admin.app')

@section('title', 'Edit Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Category: {{ $category->title }}</h4>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Category Information</h4>
                            <span class="text-muted">{{ now()->format('Y-m-d H:i:s') }} UTC</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" 
                                           id="title" 
                                           name="title" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           placeholder="Enter category title"
                                           value="{{ old('title', $category->title) }}"
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="sub_title" class="form-label">Subtitle</label>
                                    <input type="text" 
                                           id="sub_title" 
                                           name="sub_title" 
                                           class="form-control @error('sub_title') is-invalid @enderror" 
                                           placeholder="Enter category subtitle"
                                           value="{{ old('sub_title', $category->sub_title) }}">
                                    @error('sub_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-0">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control bg-light-subtle @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="4" 
                                              placeholder="Type category description">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Additional Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Created At</label>
                                    <p class="mb-0">{{ $category->created_at->format('Y-m-d H:i:s') }} UTC</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Last Updated</label>
                                    <p class="mb-0">{{ $category->updated_at->format('Y-m-d H:i:s') }} UTC</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Slug</label>
                                    <p class="mb-0">{{ $category->slug }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <span class="text-muted">Last edited by: {{ auth()->user()->name }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="row g-2">
                                <div class="col-auto">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Update Category
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Confirm before leaving page if form has been modified
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        let formChanged = false;

        const inputs = form.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('change', () => {
                formChanged = true;
            });
        });

        window.addEventListener('beforeunload', (event) => {
            if (formChanged) {
                event.preventDefault();
                event.returnValue = '';
            }
        });

        // Don't show warning when submitting the form
        form.addEventListener('submit', () => {
            formChanged = false;
        });
    });
</script>
@endsection