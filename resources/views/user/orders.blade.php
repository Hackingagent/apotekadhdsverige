@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('user.partials.sidebar')
            </div>

            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">My Orders</h5>
                        <a href="/products" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i> New Order
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Order #</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td>#{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        <td>{{ $order->items_count }}</td>
                                        <td>
                                            <span class="badge bg-{{ $order->status_color }}">{{ ucfirst($order->status) }}</span>
                                        </td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td class="text-end">
                                            <a href="/user/orders/{{ $order->id }}" class="btn btn-sm btn-outline-primary">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
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
                    @if($orders->hasPages())
                    <div class="card-footer">
                        {{ $orders->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection