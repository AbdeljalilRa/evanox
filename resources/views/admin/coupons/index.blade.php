@extends('layouts.admin.app')

@section('title', 'Coupons Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h4 class="card-title flex-grow-1 mb-0">All Coupons List</h4>
                    <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i> Add Coupon
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3" style="min-width: 150px;">Code</th>
                                    <th class="py-3" style="min-width: 200px;">Email</th>
                                    <th class="py-3" style="min-width: 100px;">Type</th>
                                    <th class="py-3" style="min-width: 100px;">Value</th>
                                    <th class="py-3" style="min-width: 120px;">Usage</th>
                                    <th class="py-3" style="min-width: 120px;">Active</th>
                                    <th class="py-3" style="min-width: 120px;">Expires At</th>
                                    <th class="py-3 text-center" style="min-width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->email ?? 'All' }}</td>
                                    <td>{{ ucfirst($coupon->type) }}</td>
                                    <td>{{ $coupon->value }}{{ $coupon->type === 'percent' ? '%' : '$' }}</td>
                                    <td>{{ $coupon->used_count }} / {{ $coupon->usage_limit ?? '∞' }}</td>
                                    <td>
                                        @if($coupon->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '-' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">

                                            <!-- Edit using slug -->
                                            <a href="{{ route('admin.coupons.edit', $coupon->slug) }}" 
                                               class="btn btn-soft-primary btn-sm"
                                               data-bs-toggle="tooltip"
                                               title="Edit">
                                                <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                            </a>

                                            <!-- Delete using slug -->
                                            <form id="delete-form-{{ $coupon->slug }}" 
                                                  action="{{ route('admin.coupons.destroy', $coupon->slug) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        class="btn btn-soft-danger btn-sm"
                                                        data-bs-toggle="tooltip"
                                                        title="Delete"
                                                        onclick="confirmDelete('delete-form-{{ $coupon->slug }}')">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="d-flex flex-column align-items-center">
                                            <i class="bx bx-ticket text-muted" style="font-size: 40px;"></i>
                                            <h5 class="mt-2">No coupons found</h5>
                                            <p class="text-muted">Start by adding a new coupon</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($coupons->hasPages())
                        <div class="d-flex justify-content-end mt-4">
                            {{ $coupons->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endsection
