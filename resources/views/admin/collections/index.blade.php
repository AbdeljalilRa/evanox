@extends('layouts.admin.app')

@section('title', 'Collections Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h4 class="card-title flex-grow-1 mb-0">All Collections</h4>
                    <a href="{{ route('admin.collections.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i> Add Collection
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="min-width: 100px;">Image</th>
                                    <th style="min-width: 200px;">Title</th>
                                    <th style="min-width: 150px;">Status</th>
                                    <th class="text-center" style="min-width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($collections as $collection)
                                    <tr>
                                        <td>
                                            @if($collection->image)
                                                <img src="{{ Storage::disk('s3')->temporaryUrl($collection->image, now()->addMinutes(5)) }}" 
                                                    alt="{{ $collection->title }}" style="width:50px;height:50px;object-fit:cover;border-radius:5px;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $collection->title }}</td>
                                        <td>
                                            <form action="{{ route('admin.collections.toggle-status', $collection) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm {{ $collection->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                    {{ $collection->is_active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.collections.edit', $collection) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('admin.collections.show', $collection) }}" class="btn btn-info btn-sm">View</a>
                                            <form action="{{ route('admin.collections.destroy', $collection) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure?')){ this.form.submit(); }">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">No collections found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($collections->hasPages())
                        <div class="d-flex justify-content-end mt-4">
                            {{ $collections->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
