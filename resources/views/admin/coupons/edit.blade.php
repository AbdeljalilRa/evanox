@extends('layouts.admin.app')

@section('title', 'Edit Coupon')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-header p-3">
                    <h4 class="card-title mb-0">Edit Coupon</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.coupons.update', $coupon->slug) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Code -->
                        <div class="mb-3">
                            <label for="code" class="form-label">Coupon Code</label>
                            <input type="text" name="code" id="code" 
                                   class="form-control @error('code') is-invalid @enderror"
                                   value="{{ old('code', $coupon->code) }}" required>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email (Optional)</label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $coupon->email) }}">
                            <small class="text-muted">Leave blank for all customers</small>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Coupon Type</label>
                            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Fixed ($)</option>
                                <option value="percent" {{ old('type', $coupon->type) == 'percent' ? 'selected' : '' }}>Percent (%)</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Value -->
                        <div class="mb-3">
                            <label for="value" class="form-label">Value</label>
                            <input type="number" name="value" id="value" step="0.01" min="0"
                                   class="form-control @error('value') is-invalid @enderror"
                                   value="{{ old('value', $coupon->value) }}" required>
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Usage Limit -->
                        <div class="mb-3">
                            <label for="usage_limit" class="form-label">Usage Limit (Optional)</label>
                            <input type="number" name="usage_limit" id="usage_limit" min="0"
                                   class="form-control @error('usage_limit') is-invalid @enderror"
                                   value="{{ old('usage_limit', $coupon->usage_limit) }}">
                            @error('usage_limit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Min Order Amount -->
                        <div class="mb-3">
                            <label for="min_order_amount" class="form-label">Minimum Order Amount (Optional)</label>
                            <input type="number" name="min_order_amount" id="min_order_amount" step="0.01" min="0"
                                   class="form-control @error('min_order_amount') is-invalid @enderror"
                                   value="{{ old('min_order_amount', $coupon->min_order_amount) }}">
                            @error('min_order_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Start & Expiry Dates -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="starts_at" class="form-label">Start Date</label>
                                <input type="datetime-local" name="starts_at" id="starts_at"
                                       class="form-control @error('starts_at') is-invalid @enderror"
                                       value="{{ old('starts_at', $coupon->starts_at?->format('Y-m-d\TH:i')) }}">
                                @error('starts_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="expires_at" class="form-label">Expiry Date</label>
                                <input type="datetime-local" name="expires_at" id="expires_at"
                                       class="form-control @error('expires_at') is-invalid @enderror"
                                       value="{{ old('expires_at', $coupon->expires_at?->format('Y-m-d\TH:i')) }}">
                                @error('expires_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Active -->
                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   value="1" {{ old('is_active', $coupon->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-save me-1"></i> Update Coupon
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
