@extends('layouts.admin.app')

@section('title', $collection->title)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header Card -->
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-white">{{ $collection->title }}</h4>
                    <div>
                        <a href="{{ route('admin.collections.edit', $collection) }}" class="btn btn-sm btn-warning me-2">
                            <i class="ri-pencil-line"></i> Edit
                        </a>
                        <a href="{{ route('admin.collections.index') }}" class="btn btn-sm btn-secondary">
                            <i class="ri-arrow-left-line"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Status Badge -->
                    <div class="mb-3">
                        @if($collection->is_active)
                            <span class="badge bg-success">
                                <i class="ri-check-line"></i> Active
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                <i class="ri-close-line"></i> Inactive
                            </span>
                        @endif
                    </div>

                    <!-- Collection Image -->
                    @if($collection->image)
                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase fs-12 fw-semibold mb-2">Main Image</h6>
                            <img src="{{ Storage::disk('s3')->temporaryUrl($collection->image, now()->addMinutes(5)) }}" 
                                 class="img-fluid rounded" 
                                 style="max-width:400px; height:auto; object-fit:cover;"
                                 alt="{{ $collection->title }}">
                        </div>
                    @endif

                    <!-- Description -->
                    @if($collection->description)
                        <div class="mb-4">
                            <h6 class="text-muted text-uppercase fs-12 fw-semibold mb-2">Description</h6>
                            <div class="bg-light p-3 rounded" style="border-left: 4px solid #0d6efd;">
                                {!! $collection->description !!}
                            </div>
                        </div>
                    @endif

                    <!-- Metadata -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div>
                                <h6 class="text-muted text-uppercase fs-12 fw-semibold">Slug</h6>
                                <p class="font-monospace text-break">{{ $collection->slug }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <h6 class="text-muted text-uppercase fs-12 fw-semibold">Created</h6>
                                <p>{{ $collection->created_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Products Section -->
                    <div class="mt-4">
                        <h5 class="mb-3">
                            <i class="ri-shopping-bag-line"></i> Products in Collection
                            <span class="badge bg-info ms-2">{{ $collection->products->count() }}</span>
                        </h5>

                        @if($collection->products->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($collection->products as $product)
                                            <tr>
                                                <td>
                                                    <span class="text-muted">#{{ $product->id }}</span>
                                                </td>
                                                <td>
                                                    <strong>{{ $product->title }}</strong>
                                                </td>
                                                <td>
                                                    @if($product->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-secondary">Inactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ route('admin.products.show', $product) }}" 
                                                       class="btn btn-xs btn-primary"
                                                       title="View Product">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="ri-information-line"></i> No products assigned to this collection yet.
                                <a href="{{ route('admin.collections.edit', $collection) }}" class="alert-link">Add products</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Delete Card -->
            <div class="card border-danger mt-3">
                <div class="card-header bg-light border-danger">
                    <h6 class="text-danger mb-0">
                        <i class="ri-alert-line"></i> Danger Zone
                    </h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">This action cannot be undone. All related data will be deleted.</p>
                    <form action="{{ route('admin.collections.destroy', $collection) }}" method="POST" id="deleteForm" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('deleteForm')">
                            <i class="ri-delete-bin-line"></i> Delete Collection
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(formId) {
    if (typeof Swal !== 'undefined') {
        Swal.fire({
            title: 'Delete Collection?',
            text: 'This will permanently delete the collection. Products will remain.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-danger me-2',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    } else {
        if (confirm('Are you sure you want to delete this collection?')) {
            document.getElementById(formId).submit();
        }
    }
}
</script>
@endsection
