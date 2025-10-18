@extends('layouts.admin.app')

@section('title', 'Order Details')

@section('content')
<div class="container-fluid py-4">
    
    {{-- Back Button with Modern Design --}}
    <div class="mb-4">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-dark btn-sm d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3 hover-lift">
            <i class="mdi mdi-arrow-left"></i>
            <span>Back to Orders</span>
        </a>
    </div>

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Order #{{ $order->id }}</h2>
            <p class="text-muted mb-0">
                <i class="mdi mdi-clock-outline me-1"></i>
                Placed on {{ $order->created_at->format('M d, Y \a\t H:i') }}
            </p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary rounded-3 px-4">
                <i class="mdi mdi-printer me-2"></i>Print
            </button>
            <button class="btn btn-primary rounded-3 px-4">
                <i class="mdi mdi-download me-2"></i>Export
            </button>
        </div>
    </div>

    <div class="row g-4">
        {{-- Left Column --}}
        <div class="col-lg-8">
            
            {{-- Order Items Card --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Order Items</h5>
                    
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="border-bottom">
                                    <th class="border-0 text-muted fw-semibold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Product</th>
                                    <th class="border-0 text-muted fw-semibold text-uppercase text-center" style="font-size: 0.75rem; letter-spacing: 0.5px;">Quantity</th>
                                    <th class="border-0 text-muted fw-semibold text-uppercase text-end" style="font-size: 0.75rem; letter-spacing: 0.5px;">Price</th>
                                    <th class="border-0 text-muted fw-semibold text-uppercase text-end" style="font-size: 0.75rem; letter-spacing: 0.5px;">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr class="border-bottom">
                                        <td class="py-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                    <i class="mdi mdi-package-variant text-muted" style="font-size: 24px;"></i>
                                                </div>
                                                <div>
                                                    <p class="mb-0 fw-semibold">{{ $item->product->title ?? 'Deleted Product' }}</p>
                                                    @if($item->product)
                                                        <small class="text-muted">SKU: {{ $item->product->id }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">{{ $item->quantity }}</span>
                                        </td>
                                        <td class="text-end fw-semibold">${{ number_format($item->price, 2) }}</td>
                                        <td class="text-end fw-bold">${{ number_format($item->quantity * $item->price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Customer Information --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Customer Information</h5>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                                    <i class="mdi mdi-account text-primary" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <p class="text-muted mb-1 small">Customer Name</p>
                                    <p class="mb-0 fw-semibold">{{ $order->user->name ?? 'Guest User' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-info bg-opacity-10 rounded-3 p-3">
                                    <i class="mdi mdi-email text-info" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <p class="text-muted mb-1 small">Email Address</p>
                                    <p class="mb-0 fw-semibold">{{ $order->user->email ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Right Column --}}
        <div class="col-lg-4">
            
            {{-- Order Summary --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4 sticky-top" style="top: 20px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Order Summary</h5>
                    
                    {{-- Status Badges --}}
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Order Status</span>
                            <span class="badge rounded-pill px-3 py-2
                                @if($order->order_status == 'completed') bg-success bg-opacity-10 text-success border border-success
                                @elseif($order->order_status == 'pending') bg-warning bg-opacity-10 text-warning border border-warning
                                @else bg-danger bg-opacity-10 text-danger border border-danger @endif">
                                <i class="mdi mdi-circle-small"></i>
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Payment Status</span>
                            <span class="badge rounded-pill px-3 py-2
                                @if($order->payment_status == 'paid') bg-success bg-opacity-10 text-success border border-success
                                @elseif($order->payment_status == 'unpaid') bg-secondary bg-opacity-10 text-secondary border border-secondary
                                @else bg-danger bg-opacity-10 text-danger border border-danger @endif">
                                <i class="mdi mdi-credit-card-outline"></i>
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- Price Breakdown --}}
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-semibold">${{ number_format($order->total, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Shipping</span>
                            <span class="fw-semibold">$0.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tax</span>
                            <span class="fw-semibold">$0.00</span>
                        </div>
                    </div>

                    <hr class="my-3">

                    {{-- Total --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-4 text-primary">${{ number_format($order->total, 2) }}</span>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="mt-4 d-grid gap-2">
                        <button class="btn btn-primary rounded-3 py-2">
                            <i class="mdi mdi-check-circle me-2"></i>Mark as Completed
                        </button>
                        <button class="btn btn-outline-danger rounded-3 py-2">
                            <i class="mdi mdi-close-circle me-2"></i>Cancel Order
                        </button>
                    </div>
                </div>
            </div>

            {{-- Timeline Card --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Order Timeline</h5>
                    
                    <div class="timeline">
                        <div class="timeline-item mb-3">
                            <div class="d-flex gap-3">
                                <div class="timeline-dot bg-success"></div>
                                <div class="flex-grow-1">
                                    <p class="mb-1 fw-semibold">Order Placed</p>
                                    <p class="mb-0 text-muted small">{{ $order->created_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        
                        @if($order->order_status == 'completed')
                        <div class="timeline-item">
                            <div class="d-flex gap-3">
                                <div class="timeline-dot bg-success"></div>
                                <div class="flex-grow-1">
                                    <p class="mb-1 fw-semibold">Order Completed</p>
                                    <p class="mb-0 text-muted small">{{ $order->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<style>
.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.timeline-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    flex-shrink: 0;
    margin-top: 4px;
}

.card {
    transition: all 0.3s ease;
}

.table > :not(caption) > * > * {
    padding: 1rem 0.75rem;
}

.badge {
    font-weight: 500;
    font-size: 0.875rem;
}
</style>
@endsection