@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Quick Stats Overview -->
    <div class="row mb-4">
        <div class="col-12 mb-4">
            <div class="card bg-gradient-primary border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="text-white mb-0">Welcome Back!</h4>
                            <p class="text-white-50 mb-0">Here's your store overview for today</p>
                        </div>
                        <div class="store-status">
                            <span class="badge bg-{{ $storeStatus == 'on' ? 'success' : 'danger' }} me-2">
                                {{ ucfirst($storeStatus) }}
                            </span>
                            <form action="{{ route('admin.store-status.toggle') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="{{ $storeStatus == 'on' ? 'off' : 'on' }}">
                                <button type="submit" class="btn btn-sm btn-light">
                                    <i class="fas fa-power-off me-1"></i>
                                    {{ $storeStatus == 'on' ? 'Turn Off' : 'Turn On' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Stats -->
    <div class="row g-4 mb-4">
        <!-- Products Overview -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-shadow-lg transition-300">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-0">Total Products</p>
                            <h3 class="fw-bold mb-0 counter">{{ $totalProducts }}</h3>
                        </div>
                        <div class="icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-box fa-fw"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-soft-primary text-primary">
                            {{ $activeProducts }} Active
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-shadow-lg transition-300">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-0">Categories</p>
                            <h3 class="fw-bold mb-0 counter">{{ $totalCategories }}</h3>
                        </div>
                        <div class="icon-shape bg-info text-white rounded-circle shadow">
                            <i class="fas fa-tags fa-fw"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-shadow-lg transition-300">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-0">Total Users</p>
                            <h3 class="fw-bold mb-0 counter">{{ $totalUsers }}</h3>
                        </div>
                        <div class="icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-users fa-fw"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Overview -->
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm hover-shadow-lg transition-300">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-0">Total Orders</p>
                            <h3 class="fw-bold mb-0 counter">{{ $totalOrders }}</h3>
                        </div>
                        <div class="icon-shape bg-success text-white rounded-circle shadow">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-soft-warning text-warning me-2">
                            {{ $pendingOrders }} Pending
                        </span>
                        <span class="badge bg-soft-success text-success">
                            {{ $completedOrders }} Completed
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Status -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm hover-shadow-lg transition-300">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Pending Orders</h6>
                        <div class="icon-shape bg-warning text-white rounded-circle shadow-sm">
                            <i class="fas fa-clock fa-fw"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold counter">{{ $pendingOrders }}</h3>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-warning" style="width: {{ $totalOrders > 0 ? ($pendingOrders / $totalOrders) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm hover-shadow-lg transition-300">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Completed Orders</h6>
                        <div class="icon-shape bg-success text-white rounded-circle shadow-sm">
                            <i class="fas fa-check fa-fw"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold counter">{{ $completedOrders }}</h3>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-success" style="width: {{ $totalOrders > 0 ? ($completedOrders / $totalOrders) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm hover-shadow-lg transition-300">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Total Orders</h6>
                        <div class="icon-shape bg-primary text-white rounded-circle shadow-sm">
                            <i class="fas fa-shopping-bag fa-fw"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold counter">{{ $totalOrders }}</h3>
                    <div class="progress" style="height: 4px;">
                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
        <div class="toast show bg-success text-white" role="alert">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
@endsection

@push('styles')
<style>
    .hover-shadow-lg {
        transition: all 0.3s ease;
    }
    .hover-shadow-lg:hover {
        transform: translateY(-5px);
    }
    .transition-300 {
        transition: all 0.3s ease-in-out;
    }
    .icon-shape {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .bg-soft-primary {
        background-color: rgba(66, 135, 245, 0.1);
    }
    .bg-soft-warning {
        background-color: rgba(255, 199, 0, 0.1);
    }
    .bg-soft-success {
        background-color: rgba(66, 214, 151, 0.1);
    }
    .counter {
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 0.5s ease forwards;
    }
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate counters
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = parseInt(counter.innerText);
        let current = 0;
        const increment = target / 20;
        const updateCounter = () => {
            if(current < target) {
                current += increment;
                counter.innerText = Math.round(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = target;
            }
        };
        updateCounter();
    });

    // Auto-hide toast after 3 seconds
    setTimeout(() => {
        const toast = document.querySelector('.toast');
        if(toast) {
            toast.classList.remove('show');
        }
    }, 3000);
});
</script>
@endpush
