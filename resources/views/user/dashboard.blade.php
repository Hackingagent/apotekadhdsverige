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
                                        <p class="card-text">You have 2 recent orders</p>
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
                                        <p class="card-text">You have 1 active prescription</p>
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
                                    <tr>
                                        <td>#12345</td>
                                        <td>Jan 15, 2023</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>$42.50</td>
                                        <td class="text-end">
                                            <a href="/user/orders/12345" class="btn btn-sm btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#12344</td>
                                        <td>Dec 22, 2022</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>$28.75</td>
                                        <td class="text-end">
                                            <a href="/user/orders/12344" class="btn btn-sm btn-outline-primary">View</a>
                                        </td>
                                    </tr>
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