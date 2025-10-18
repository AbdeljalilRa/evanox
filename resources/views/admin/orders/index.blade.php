@extends('layouts.admin.app')

@section('title', 'Orders')

@section('content')
    <div class="container-fluid py-4">

        {{-- Filters --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white border-0">
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="mdi mdi-filter-outline me-2"></i> Filter Orders
                </h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('admin.orders.index') }}" class="row gy-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Order Status</label>
                        <select name="order_status" class="form-select rounded-pill">
                            <option value="">All</option>
                            <option value="pending" {{ request('order_status') == 'pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="completed" {{ request('order_status') == 'completed' ? 'selected' : '' }}>
                                Completed</option>
                            <option value="cancelled" {{ request('order_status') == 'cancelled' ? 'selected' : '' }}>
                                Cancelled</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold text-muted">Payment Status</label>
                        <select name="payment_status" class="form-select rounded-pill">
                            <option value="">All</option>
                            <option value="unpaid" {{ request('payment_status') == 'unpaid' ? 'selected' : '' }}>Unpaid
                            </option>
                            <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Failed
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary px-4 me-2 rounded-pill">
                            <i class="mdi mdi-filter-variant me-1"></i> Filter
                        </button>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="mdi mdi-refresh me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        {{-- Orders Table --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0">
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="mdi mdi-cart-outline me-2"></i> Orders List
                </h5>
            </div>

            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle table-hover mb-0">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Order Status</th>
                                <th>Payment</th>
                                <th>Created</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="fw-semibold text-secondary">{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                                    <td class="fw-bold text-dark">${{ number_format($order->total, 2) }}</td>

                                    {{-- Order Status Text --}}
                                    <td>
                                        @php
                                            $statusClasses = [
                                                'completed' =>
                                                    'bg-success-subtle text-success border border-success-subtle',
                                                'pending' =>
                                                    'bg-warning-subtle text-warning border border-warning-subtle',
                                                'cancelled' =>
                                                    'bg-danger-subtle text-danger border border-danger-subtle',
                                            ];
                                        @endphp

                                        <span
                                            class="badge rounded-pill px-3 py-2 fw-semibold {{ $statusClasses[$order->order_status] ?? 'bg-secondary-subtle text-secondary' }}">
                                            <i class="mdi mdi-circle-medium me-1"></i>
                                            {{ ucfirst($order->order_status) }}
                                        </span>
                                    </td>

                                    {{-- Payment Status Text --}}
                                    <td>
                                        @php
                                            $paymentClasses = [
                                                'paid' => 'bg-success-subtle text-success border border-success-subtle',
                                                'unpaid' =>
                                                    'bg-secondary-subtle text-secondary border border-secondary-subtle',
                                                'failed' => 'bg-danger-subtle text-danger border border-danger-subtle',
                                            ];
                                        @endphp

                                        <span
                                            class="badge rounded-pill px-3 py-2 fw-semibold {{ $paymentClasses[$order->payment_status] ?? 'bg-light text-dark border' }}">
                                            <i class="mdi mdi-credit-card-outline me-1"></i>
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>


                                    <td class="text-muted">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            <i class="mdi mdi-eye-outline"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        <i class="mdi mdi-package-variant-remove mdi-24px d-block mb-2"></i>
                                        No orders found.
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.change-status').forEach(select => {
                select.addEventListener('change', function() {
                    const orderId = this.dataset.id;
                    const field = this.dataset.field;
                    const value = this.value;

                    fetch(`/admin/orders/${orderId}/update-status`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                field,
                                value
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.message) {
                                toastr.success(data.message);
                            }
                        })
                        .catch(() => toastr.error('Something went wrong!'));
                });
            });
        });
    </script>
@endpush
