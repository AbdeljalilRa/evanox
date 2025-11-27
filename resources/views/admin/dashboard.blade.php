@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <!-- Hero Welcome Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="hero-card bg-gradient-primary text-white shadow-lg rounded-4 p-4 position-relative overflow-hidden">
                <div class="hero-pattern"></div>
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="hero-content">
                        <h1 class="display-5 fw-bold mb-2">Welcome Back, {{ Auth::user()->name ?? 'Admin' }}! 🚀</h1>
                        <p class="lead mb-0 opacity-75">Your digital store is thriving. Here's a quick overview.</p>
                    </div>
                    <div class="store-toggle d-flex align-items-center">
                        <span class="badge fs-6 me-3 px-3 py-2 bg-{{ $storeStatus == 'on' ? 'success' : 'danger' }} rounded-pill shadow-sm">
                            Store {{ ucfirst($storeStatus) }}
                        </span>
                        <form action="{{ route('admin.store-status.toggle') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="status" value="{{ $storeStatus == 'on' ? 'off' : 'on' }}">
                            <button type="submit" class="btn btn-light btn-lg rounded-pill shadow-sm toggle-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Toggle Store Status">
                                <i class="fas fa-power-off me-2"></i>
                                {{ $storeStatus == 'on' ? 'Turn Off' : 'Turn On' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Metrics Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="metric-card card border-0 shadow-sm hover-lift rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="metric-info">
                            <p class="text-muted fw-medium mb-1">Total Products</p>
                            <h2 class="fw-bold mb-2 counter" data-target="{{ $totalProducts }}">0</h2>
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-1">
                                <i class="fas fa-circle-check me-1"></i>{{ $activeProducts }} Active
                            </span>
                        </div>
                        <div class="metric-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm pulse-icon">
                            <i class="fas fa-box fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="metric-card card border-0 shadow-sm hover-lift rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="metric-info">
                            <p class="text-muted fw-medium mb-1">Categories</p>
                            <h2 class="fw-bold mb-2 counter" data-target="{{ $totalCategories }}">0</h2>
                        </div>
                        <div class="metric-icon bg-info text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm pulse-icon">
                            <i class="fas fa-tags fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="metric-card card border-0 shadow-sm hover-lift rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="metric-info">
                            <p class="text-muted fw-medium mb-1">Total Users</p>
                            <h2 class="fw-bold mb-2 counter" data-target="{{ $totalUsers }}">0</h2>
                        </div>
                        <div class="metric-icon bg-warning text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm pulse-icon">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="metric-card card border-0 shadow-sm hover-lift rounded-3 overflow-hidden">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="metric-info">
                            <p class="text-muted fw-medium mb-1">Total Orders</p>
                            <h2 class="fw-bold mb-2 counter" data-target="{{ $totalOrders }}">0</h2>
                            <div class="d-flex gap-2 mt-2">
                                <span class="badge bg-warning-subtle text-warning rounded-pill px-2 py-1">
                                    <i class="fas fa-clock me-1"></i>{{ $pendingOrders }} Pending
                                </span>
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1">
                                    <i class="fas fa-check me-1"></i>{{ $completedOrders }} Completed
                                </span>
                            </div>
                        </div>
                        <div class="metric-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm pulse-icon">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Status & Quick Actions -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-light border-0 py-3">
                    <h5 class="mb-0 fw-bold">Order Status Overview</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="status-item text-center">
                                <div class="status-icon bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-sm">
                                    <i class="fas fa-clock fa-2x"></i>
                                </div>
                                <h4 class="fw-bold counter" data-target="{{ $pendingOrders }}">0</h4>
                                <p class="text-muted mb-2">Pending Orders</p>
                                <div class="progress rounded-pill" style="height: 6px;">
                                    <div class="progress-bar bg-warning" style="width: {{ $totalOrders > 0 ? ($pendingOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="status-item text-center">
                                <div class="status-icon bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-sm">
                                    <i class="fas fa-check fa-2x"></i>
                                </div>
                                <h4 class="fw-bold counter" data-target="{{ $completedOrders }}">0</h4>
                                <p class="text-muted mb-2">Completed Orders</p>
                                <div class="progress rounded-pill" style="height: 6px;">
                                    <div class="progress-bar bg-success" style="width: {{ $totalOrders > 0 ? ($completedOrders / $totalOrders) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="status-item text-center">
                                <div class="status-icon bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center shadow-sm">
                                    <i class="fas fa-shopping-bag fa-2x"></i>
                                </div>
                                <h4 class="fw-bold counter" data-target="{{ $totalOrders }}">0</h4>
                                <p class="text-muted mb-2">Total Orders</p>
                                <div class="progress rounded-pill" style="height: 6px;">
                                    <div class="progress-bar bg-primary" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-light border-0 py-3">
                    <h5 class="mb-0 fw-bold">Quick Actions</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-grid gap-3">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-lg rounded-pill d-flex align-items-center justify-content-center shadow-sm hover-scale">
                            <i class="fas fa-plus me-2"></i>Add Product
                        </a>
                        <a href="{{ route('admin.coupons.create') }}" class="btn btn-info btn-lg rounded-pill d-flex align-items-center justify-content-center shadow-sm hover-scale">
                            <i class="fas fa-ticket-alt me-2"></i>Create Coupon
                        </a>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-success btn-lg rounded-pill d-flex align-items-center justify-content-center shadow-sm hover-scale">
                            <i class="fas fa-users me-2"></i>View Customers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $storeStatus = \Illuminate\Support\Facades\DB::table('settings')
                    ->where('key', 'store_status')
                    ->value('value') ?? 'off';
@endphp

@if(session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
        <div class="toast show bg-success text-white rounded-3 shadow-lg" role="alert">
            <div class="toast-body d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
@endsection

@push('styles')
<style>
    .dashboard-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 2rem 0;
    }
    .hero-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
    }
    .hero-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
        opacity: 0.1;
    }
    .toggle-btn:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease;
    }
    .metric-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    .hover-lift {
        transition: all 0.3s ease;
    }
    .pulse-icon {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    .hover-scale:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease;
    }
    .status-icon {
        width: 60px;
        height: 60px;
    }
    .counter {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .bg-primary-subtle { background-color: rgba(13, 110, 253, 0.1); }
    .bg-warning-subtle { background-color: rgba(255, 193, 7, 0.1); }
    .bg-success-subtle { background-color: rgba(25, 135, 84, 0.1); }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Animate counters with stagger
    const counters = document.querySelectorAll('.counter');
    counters.forEach((counter, index) => {
        setTimeout(() => {
            const target = parseInt(counter.getAttribute('data-target'));
            let current = 0;
            const increment = target / 50;
            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.innerText = Math.round(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = target;
                }
            };
            updateCounter();
        }, index * 200); // Stagger animation
    });

    // Auto-hide toast
    setTimeout(() => {
        const toast = document.querySelector('.toast');
        if (toast) {
            toast.classList.remove('show');
        }
    }, 4000);
});
</script>
@endpush