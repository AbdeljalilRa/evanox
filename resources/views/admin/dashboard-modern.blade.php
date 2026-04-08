@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-modern">
    <!-- ==================== HEADER SECTION ==================== -->
    <div class="dashboard-header mb-5">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="page-title mb-2">Dashboard</h1>
                <p class="text-muted mb-0">Welcome back, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>. Here's what's happening with your store today.</p>
            </div>
            <div class="d-flex gap-2">
                <span class="badge fs-6 px-3 py-2 bg-{{ $storeStatus == 'on' ? 'success' : 'danger' }} rounded-pill shadow-sm">
                    Store {{ ucfirst($storeStatus) }}
                </span>
                <form action="{{ route('admin.store-status.toggle') }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="status" value="{{ $storeStatus == 'on' ? 'off' : 'on' }}">
                    <button type="submit" class="btn btn-outline-secondary btn-sm rounded-pill" title="Toggle Store Status">
                        <iconify-icon icon="mdi:power" class="me-1"></iconify-icon>
                        {{ $storeStatus == 'on' ? 'Turn Off' : 'Turn On' }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- ==================== KEY METRICS CARDS ==================== -->
    <div class="row g-3 mb-5">
        <!-- Total Orders Card -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card border-0 h-100 shadow-sm rounded-4 overflow-hidden transition-all">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted fw-500 mb-1 fs-sm">Total Orders</p>
                            <h3 class="fw-bold mb-2 fs-1 counter" data-target="{{ $totalOrders }}">0</h3>
                        </div>
                        <div class="stat-icon bg-primary-subtle rounded-3 p-3 d-flex align-items-center justify-content-center">
                            <iconify-icon icon="mdi:cart-outline" class="fs-2 text-primary"></iconify-icon>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 fs-xs">
                            <iconify-icon icon="mdi:trending-up"></iconify-icon>
                            {{ $orderGrowth > 0 ? '+' : '' }}{{ $orderGrowth }}%
                        </span>
                        <span class="text-muted fs-xs">vs last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue Card -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card border-0 h-100 shadow-sm rounded-4 overflow-hidden transition-all">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted fw-500 mb-1 fs-sm">Total Revenue</p>
                            <h3 class="fw-bold mb-2 fs-1" id="totalRevenue">${{ number_format($totalRevenue, 2) }}</h3>
                        </div>
                        <div class="stat-icon bg-success-subtle rounded-3 p-3 d-flex align-items-center justify-content-center">
                            <iconify-icon icon="mdi:cash-multiple" class="fs-2 text-success"></iconify-icon>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 fs-xs">
                            <iconify-icon icon="mdi:trending-up"></iconify-icon>
                            +12%
                        </span>
                        <span class="text-muted fs-xs">from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card border-0 h-100 shadow-sm rounded-4 overflow-hidden transition-all">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted fw-500 mb-1 fs-sm">Total Users</p>
                            <h3 class="fw-bold mb-2 fs-1 counter" data-target="{{ $totalUsers }}">0</h3>
                        </div>
                        <div class="stat-icon bg-warning-subtle rounded-3 p-3 d-flex align-items-center justify-content-center">
                            <iconify-icon icon="mdi:account-multiple-outline" class="fs-2 text-warning"></iconify-icon>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-{{ $userGrowth > 0 ? 'success' : 'danger' }}-subtle text-{{ $userGrowth > 0 ? 'success' : 'danger' }} rounded-pill px-2 py-1 fs-xs">
                            <iconify-icon icon="mdi:{{ $userGrowth > 0 ? 'trending-up' : 'trending-down' }}"></iconify-icon>
                            {{ $userGrowth > 0 ? '+' : '' }}{{ $userGrowth }}%
                        </span>
                        <span class="text-muted fs-xs">vs last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Products Card -->
        <div class="col-md-6 col-lg-3">
            <div class="stat-card card border-0 h-100 shadow-sm rounded-4 overflow-hidden transition-all">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted fw-500 mb-1 fs-sm">Total Products</p>
                            <h3 class="fw-bold mb-2 fs-1 counter" data-target="{{ $totalProducts }}">0</h3>
                        </div>
                        <div class="stat-icon bg-info-subtle rounded-3 p-3 d-flex align-items-center justify-content-center">
                            <iconify-icon icon="mdi:package-variant-outline" class="fs-2 text-info"></iconify-icon>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1 fs-xs">
                            <iconify-icon icon="mdi:check-circle-outline"></iconify-icon>
                            {{ $activeProducts }} Active
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== CHARTS SECTION ==================== -->
    <div class="row g-3 mb-5">
        <!-- Revenue Chart -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white border-bottom-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0 fw-bold">Revenue Overview</h5>
                            <p class="text-muted fs-sm mb-0">Last 12 months revenue trend</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary rounded-pill" type="button" data-bs-toggle="dropdown">
                                <iconify-icon icon="mdi:dots-vertical"></iconify-icon>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Last 7 days</a></li>
                                <li><a class="dropdown-item" href="#">Last 30 days</a></li>
                                <li><a class="dropdown-item" href="#">Last 12 months</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div id="revenueChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Order Status Distribution -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white border-bottom-0 p-4">
                    <h5 class="card-title mb-0 fw-bold">Order Status</h5>
                    <p class="text-muted fs-sm mb-0">Distribution of orders</p>
                </div>
                <div class="card-body p-4">
                    <div id="statusChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== ORDERS & USERS SECTION ==================== -->
    <div class="row g-3">
        <!-- Recent Orders Table -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0 fw-bold">Recent Orders</h5>
                            <p class="text-muted fs-sm mb-0">Latest orders from your store</p>
                        </div>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">
                            View All <iconify-icon icon="mdi:arrow-right"></iconify-icon>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="border-bottom bg-light">
                                <tr>
                                    <th class="px-4 py-3 fw-bold text-muted fs-sm">Order ID</th>
                                    <th class="px-4 py-3 fw-bold text-muted fs-sm">Customer</th>
                                    <th class="px-4 py-3 fw-bold text-muted fs-sm">Total</th>
                                    <th class="px-4 py-3 fw-bold text-muted fs-sm">Status</th>
                                    <th class="px-4 py-3 fw-bold text-muted fs-sm">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders as $order)
                                    <tr class="align-middle">
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="fw-bold text-primary text-decoration-none">
                                                #{{ $order->id }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar avatar-sm rounded-circle bg-primary-subtle d-flex align-items-center justify-content-center">
                                                    <span class="text-primary fw-bold fs-sm">{{ substr($order->user->name, 0, 1) }}</span>
                                                </div>
                                                <div>
                                                    <p class="mb-0 fw-500">{{ $order->user->name }}</p>
                                                    <p class="mb-0 text-muted fs-xs">{{ $order->user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 fw-bold">${{ number_format($order->total, 2) }}</td>
                                        <td class="px-4 py-3">
                                            @php
                                                $statusClasses = [
                                                    'pending' => 'bg-warning-subtle text-warning',
                                                    'processing' => 'bg-info-subtle text-info',
                                                    'completed' => 'bg-success-subtle text-success',
                                                    'cancelled' => 'bg-danger-subtle text-danger',
                                                    'refunded' => 'bg-secondary-subtle text-secondary',
                                                ];
                                                $statusClass = $statusClasses[$order->order_status] ?? 'bg-secondary-subtle text-secondary';
                                            @endphp
                                            <span class="badge {{ $statusClass }} rounded-pill px-3 py-1">
                                                {{ ucfirst($order->order_status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-muted fs-sm">{{ $order->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-5 text-center text-muted">
                                            <div class="py-4">
                                                <iconify-icon icon="mdi:inbox-outline" class="fs-1 opacity-50 d-block mb-2"></iconify-icon>
                                                <p class="mb-0">No orders found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-0 fw-bold">Recent Users</h5>
                            <p class="text-muted fs-sm mb-0">New customer signups</p>
                        </div>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">
                            View All <iconify-icon icon="mdi:arrow-right"></iconify-icon>
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="space-y-3">
                        @forelse($recentUsers as $user)
                            <div class="d-flex align-items-center justify-content-between p-3 rounded-3 bg-light hover-bg-lighter transition-all">
                                <div class="d-flex align-items-center gap-3 flex-grow-1">
                                    <div class="avatar avatar-sm rounded-circle bg-primary-subtle d-flex align-items-center justify-content-center flex-shrink-0">
                                        <span class="text-primary fw-bold fs-sm">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <p class="mb-1 fw-500 text-truncate">{{ $user->name }}</p>
                                        <p class="mb-0 text-muted fs-xs text-truncate">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success rounded-pill px-2 py-1 fs-xs flex-shrink-0">
                                    {{ $user->created_at->diffForHumans() }}
                                </span>
                            </div>
                        @empty
                            <div class="text-center py-5 text-muted">
                                <iconify-icon icon="mdi:account-outline" class="fs-1 opacity-50 d-block mb-2"></iconify-icon>
                                <p class="mb-0 fs-sm">No users yet</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==================== STYLES ==================== -->
<style>
    :root {
        --primary: #007bff;
        --success: #28a745;
        --warning: #ffc107;
        --danger: #dc3545;
        --info: #17a2b8;
        --light-gray: #f8f9fa;
        --border-radius: 12px;
    }

    .dashboard-modern {
        background: #fff;
        border-radius: var(--border-radius);
    }

    .dashboard-header {
        padding: 1.5rem 0;
        border-bottom: 1px solid #e9ecef;
        margin-bottom: 2rem !important;
    }

    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1a1a1a;
    }

    /* Stat Cards */
    .stat-card {
        border-radius: var(--border-radius);
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }

    .stat-card:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12) !important;
        transform: translateY(-4px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        flex-shrink: 0;
    }

    .counter {
        font-size: 2rem;
        line-height: 1;
        color: #1a1a1a;
    }

    .fs-sm {
        font-size: 0.875rem;
    }

    .fw-500 {
        font-weight: 500;
    }

    /* Chart Cards */
    .card {
        border-radius: var(--border-radius);
        overflow: hidden;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .card-header {
        border-bottom: 1px solid #e9ecef;
    }

    .card-title {
        color: #1a1a1a;
        margin-bottom: 0;
    }

    /* Table Styles */
    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        color: #6c757d;
        font-weight: 600;
        padding: 1rem;
        vertical-align: middle;
    }

    .table tbody td {
        vertical-align: middle;
        border-bottom: 1px solid #e9ecef;
        padding: 1rem;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Avatar */
    .avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        min-width: 40px;
        height: 40px;
    }

    .avatar-sm {
        min-width: 32px;
        height: 32px;
        font-size: 0.75rem;
    }

    /* Badges */
    .badge {
        font-weight: 500;
        font-size: 0.75rem;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* Utility Classes */
    .transition-all {
        transition: all 0.3s ease;
    }

    .hover-bg-lighter:hover {
        background-color: #e9ecef !important;
    }

    .space-y-3 > * + * {
        margin-top: 1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.5rem;
        }

        .counter {
            font-size: 1.5rem;
        }

        .stat-card {
            margin-bottom: 0.5rem;
        }
    }
</style>

<!-- ==================== APEXCHARTS CDN ==================== -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>

<!-- ==================== ICONIFY CDN ==================== -->
<script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

<!-- ==================== DASHBOARD SCRIPTS ==================== -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        const speed = 50;

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const increment = target / speed;

            const updateCount = () => {
                const count = +counter.innerText;
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 30);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };

            updateCount();
        });

        // Revenue Chart
        const revenueChartOptions = {
            series: [{
                name: 'Revenue',
                data: [
                    @foreach($monthlyRevenue as $item)
                        {{ $item['revenue'] }},
                    @endforeach
                ]
            }],
            chart: {
                type: 'area',
                height: 300,
                toolbar: { show: false },
                sparkline: { enabled: false },
                animations: {
                    enabled: true,
                    speed: 800,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    }
                }
            },
            colors: ['#007bff'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.45,
                    opacityTo: 0.05,
                    stops: [20, 100, 100, 100]
                }
            },
            xaxis: {
                categories: [
                    @foreach($monthlyRevenue as $item)
                        '{{ $item['month'] }}',
                    @endforeach
                ],
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: { style: { colors: '#6c757d', fontSize: '12px' } }
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return '$' + value.toFixed(0);
                    },
                    style: { colors: '#6c757d', fontSize: '12px' }
                }
            },
            tooltip: {
                theme: 'light',
                x: { format: 'MMM' },
                y: { formatter: function(value) { return '$' + value.toFixed(2); } }
            },
            grid: {
                borderColor: '#e9ecef',
                strokeDashArray: 3,
                xaxis: { lines: { show: true } },
                yaxis: { lines: { show: true } }
            }
        };

        const revenueChart = new ApexCharts(document.querySelector('#revenueChart'), revenueChartOptions);
        revenueChart.render();

        // Status Distribution Chart
        const statusChartOptions = {
            series: [
                @foreach($orderStatusDistribution as $item)
                    {{ $item['count'] }},
                @endforeach
            ],
            labels: [
                @foreach($orderStatusDistribution as $item)
                    '{{ $item['status'] }}',
                @endforeach
            ],
            chart: {
                type: 'donut',
                height: 300
            },
            colors: ['#ffc107', '#17a2b8', '#28a745', '#dc3545', '#6c757d'],
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total Orders',
                                fontSize: '14px',
                                fontFamily: 'inherit',
                                color: '#6c757d'
                            }
                        }
                    }
                }
            },
            legend: {
                position: 'bottom',
                fontSize: '12px',
                markers: { size: 6 }
            },
            tooltip: {
                theme: 'light'
            }
        };

        const statusChart = new ApexCharts(document.querySelector('#statusChart'), statusChartOptions);
        statusChart.render();
    });
</script>
@endsection
