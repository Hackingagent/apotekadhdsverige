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
                                        <th>Status</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Order 1 -->
                                    <tr>
                                        <td>#PH-10025</td>
                                        <td>May 15, 2023</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>3</td>
                                        <td>$42.50</td>
                                        <td class="text-end">
                                            <a href="/user/orders/10025" class="btn btn-sm btn-outline-primary">
                                                Details
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Order 2 -->
                                    <tr>
                                        <td>#PH-10018</td>
                                        <td>Apr 28, 2023</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>2</td>
                                        <td>$28.75</td>
                                        <td class="text-end">
                                            <a href="/user/orders/10018" class="btn btn-sm btn-outline-primary">
                                                Details
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Order 3 -->
                                    <tr>
                                        <td>#PH-10005</td>
                                        <td>Apr 5, 2023</td>
                                        <td><span class="badge bg-warning text-dark">Processing</span></td>
                                        <td>1</td>
                                        <td>$12.99</td>
                                        <td class="text-end">
                                            <a href="/user/orders/10005" class="btn btn-sm btn-outline-primary">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Order Details (Example for one order) -->
                <div class="card mb-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Order Details #PH-10025</h5>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-print me-1"></i> Print Invoice
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold">Shipping Address</h6>
                                <p>
                                    John Doe<br>
                                    123 Main Street<br>
                                    Medical City, NY 10001<br>
                                    (123) 456-7890
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold">Order Information</h6>
                                <p>
                                    <strong>Date:</strong> May 15, 2023<br>
                                    <strong>Status:</strong> <span class="badge bg-success">Delivered</span><br>
                                    <strong>Payment:</strong> Visa •••• 4242
                                </p>
                            </div>
                        </div>

                        <div class="table-responsive mb-4">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Extra Strength Pain Reliever</strong><br>
                                            <small class="text-muted">SKU: PR-500</small>
                                        </td>
                                        <td>$12.99</td>
                                        <td>1</td>
                                        <td>$12.99</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Allergy Relief Tablets</strong><br>
                                            <small class="text-muted">SKU: AR-200</small>
                                        </td>
                                        <td>$8.50</td>
                                        <td>2</td>
                                        <td>$17.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Vitamin C 1000mg</strong><br>
                                            <small class="text-muted">SKU: VC-1000</small>
                                        </td>
                                        <td>$12.50</td>
                                        <td>1</td>
                                        <td>$12.50</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end">Subtotal:</td>
                                        <td>$42.49</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">Shipping:</td>
                                        <td>FREE</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">Tax:</td>
                                        <td>$3.40</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td colspan="3" class="text-end">Total:</td>
                                        <td>$45.89</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-undo me-2"></i> Request Return
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-shopping-cart me-2"></i> Reorder Items
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection