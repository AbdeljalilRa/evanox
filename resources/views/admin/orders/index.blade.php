@extends('layouts.admin.app')

@section('title', 'Orders')

@section('content')
    <div class="container-fluid py-4">

        {{-- Search and Filters --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white border-0">
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="mdi mdi-magnify me-2"></i> Search & Filter Orders
                </h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('admin.orders.index') }}" class="row gy-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-muted">Search by Order ID or User</label>
                        <input type="text" name="search" class="form-control rounded-pill" 
                            placeholder="Order ID, Name or Email..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-muted">Order Status</label>
                        <select name="order_status" class="form-select rounded-pill">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('order_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ request('order_status') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ request('order_status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('order_status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="refunded" {{ request('order_status') == 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-muted">Payment Status</label>
                        <select name="payment_status" class="form-select rounded-pill">
                            <option value="">All Payments</option>
                            <option value="unpaid" {{ request('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                            <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="refunded" {{ request('payment_status') == 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill w-100">
                            <i class="mdi mdi-filter-variant me-1"></i> Filter
                        </button>
                    </div>

                    @if(request('search') || request('order_status') || request('payment_status'))
                    <div class="col-md-12">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="mdi mdi-refresh me-1"></i> Clear Filters
                        </a>
                    </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- Orders Table --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="mdi mdi-cart-outline me-2"></i> Orders List
                </h5>
                <span class="badge bg-info rounded-pill fs-6">{{ $orders->total() }} Orders</span>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle table-hover mb-0">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th style="width: 60px;">#ID</th>
                                <th>User</th>
                                <th style="width: 100px;">Total</th>
                                <th>Order Status</th>
                                <th>Payment</th>
                                <th>Method</th>
                                <th>Created</th>
                                <th style="width: 150px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="fw-semibold text-secondary">#{{ $order->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div>
                                                <p class="fw-semibold mb-0">{{ $order->user->name ?? 'Guest' }}</p>
                                                <p class="text-muted small mb-0">{{ $order->user->email ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-dark" style="font-size: 1.1rem;">
                                        ${{ number_format($order->total, 2) }}
                                    </td>

                                    {{-- Order Status --}}
                                    <td>
                                        @php
                                            $statusClasses = [
                                                'completed' => 'bg-success-subtle text-success border border-success-subtle',
                                                'processing' => 'bg-info-subtle text-info border border-info-subtle',
                                                'pending' => 'bg-warning-subtle text-warning border border-warning-subtle',
                                                'cancelled' => 'bg-danger-subtle text-danger border border-danger-subtle',
                                                'refunded' => 'bg-secondary-subtle text-secondary border border-secondary-subtle',
                                            ];
                                        @endphp
                                        <span class="badge rounded-pill px-3 py-2 fw-semibold {{ $statusClasses[$order->order_status] ?? 'bg-light text-dark' }}">
                                            <i class="mdi mdi-circle-medium me-1"></i>
                                            {{ ucfirst(str_replace('_', ' ', $order->order_status)) }}
                                        </span>
                                    </td>

                                    {{-- Payment Status --}}
                                    <td>
                                        @php
                                            $paymentClasses = [
                                                'paid' => 'bg-success-subtle text-success border border-success-subtle',
                                                'unpaid' => 'bg-secondary-subtle text-secondary border border-secondary-subtle',
                                                'pending' => 'bg-warning-subtle text-warning border border-warning-subtle',
                                                'failed' => 'bg-danger-subtle text-danger border border-danger-subtle',
                                                'refunded' => 'bg-info-subtle text-info border border-info-subtle',
                                            ];
                                        @endphp
                                        <span class="badge rounded-pill px-3 py-2 fw-semibold {{ $paymentClasses[$order->payment_status] ?? 'bg-light text-dark' }}">
                                            <i class="mdi mdi-credit-card-outline me-1"></i>
                                            {{ ucfirst(str_replace('_', ' ', $order->payment_status)) }}
                                        </span>
                                    </td>

                                    <td class="text-muted">{{ ucfirst($order->payment_method ?? 'N/A') }}</td>
                                    <td class="text-muted">{{ $order->created_at->format('M d, Y') }}</td>
                                    
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                                title="View Details">
                                                <i class="mdi mdi-eye-outline"></i>
                                            </a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 delete-btn"
                                                    title="Delete Order" data-id="{{ $order->id }}">
                                                    <i class="mdi mdi-delete-outline"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-muted">
                                        <i class="mdi mdi-package-variant-remove mdi-24px d-block mb-2"></i>
                                        <p>No orders found.</p>
                                        <small>Try adjusting your filters or search criteria.</small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pt-3 border-top">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        // Delete confirmation
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const orderId = this.dataset.id;
                confirmDelete(this.closest('form'));
            });
        });

        function confirmDelete(form) {
            Swal.fire({
                title: 'Delete Order?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endpush
