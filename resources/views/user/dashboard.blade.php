@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ Auth::user()->avatar ?? '/images/user-default.png' }}" alt="Profile" class="rounded-circle mb-3" width="120" height="120">
                        <h5 class="card-title mb-1">{{ Auth::user()->name }}</h5>
                        <p class="text-muted small mb-3">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="/user/profile" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-user-edit me-1"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Menu</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="/user/dashboard" class="list-group-item list-group-item-action active">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                        <a href="/user/orders" class="list-group-item list-group-item-action">
                            <i class="fas fa-shopping-bag me-2"></i> My Orders
                        </a>
                        <a href="/user/prescriptions" class="list-group-item list-group-item-action">
                            <i class="fas fa-file-prescription me-2"></i> Prescriptions
                        </a>
                        <a href="/user/profile" class="list-group-item list-group-item-action">
                            <i class="fas fa-user me-2"></i> Profile
                        </a>
                        <a href="/user/addresses" class="list-group-item list-group-item-action">
                            <i class="fas fa-map-marker-alt me-2"></i> Addresses
                        </a>
                        <a href="/user/payment-methods" class="list-group-item list-group-item-action">
                            <i class="fas fa-credit-card me-2"></i> Payment Methods
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="list-group-item list-group-item-action border-0">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Dashboard</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                            <i class="fas fa-shopping-bag text-primary fs-4"></i>
                                        </div>
                                        <h5 class="card-title">Recent Orders</h5>
                                        <p class="card-text">You have {{ $recentOrders->count() }} recent orders</p>
                                        <a href="/user/orders" class="btn btn-outline-primary btn-sm">View All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="card-body text-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                            <i class="fas fa-file-prescription text-primary fs-4"></i>
                                        </div>
                                        <h5 class="card-title">Active Prescriptions</h5>
                                        <p class="card-text">You have {{ $activePrescriptions }} active prescriptions</p>
                                        <a href="/user/prescriptions" class="btn btn-outline-primary btn-sm">Manage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Orders</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentOrders as $order)
                                    <tr>
                                        <td>#{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $order->status_color }}">{{ ucfirst($order->status) }}</span>
                                        </td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td class="text-end">
                                            <a href="/user/orders/{{ $order->id }}" class="btn btn-sm btn-outline-primary">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <i class="fas fa-shopping-bag fa-2x text-muted mb-3"></i>
                                            <p class="text-muted">You haven't placed any orders yet</p>
                                            <a href="/products" class="btn btn-primary">Shop Now</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Health Reminders</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i> You have no upcoming medication reminders.
                        </div>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-plus me-2"></i> Add Reminder
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection