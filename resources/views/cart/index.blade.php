@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <h1 class="fw-bold mb-4">Your Shopping Cart</h1>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/70x70?text=Product"
                                                     alt="Product" class="img-fluid rounded" style="width: 70px;">
                                                <div class="ms-3">
                                                    <h6 class="mb-1"><a href="/products/product-name" class="text-dark">Product Name</a></h6>
                                                    <p class="text-muted small mb-0">Category</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>$12.99</td>
                                        <td>
                                            <div class="input-group" style="width: 120px;">
                                                <button class="btn btn-outline-secondary btn-sm">-</button>
                                                <input type="text" class="form-control form-control-sm text-center" value="1">
                                                <button class="btn btn-outline-secondary btn-sm">+</button>
                                            </div>
                                        </td>
                                        <td>$12.99</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>$12.99</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax</span>
                            <span>$1.30</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total</span>
                            <span>$14.29</span>
                        </div>
                    </div>
                </div>

                <a href="/cart/checkout" class="btn btn-primary w-100">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</div>
@endsection