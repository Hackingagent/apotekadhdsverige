@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <h1 class="fw-bold mb-4">All Products</h1>

        <div class="row">
            <div class="col-lg-3">
                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/products" class="text-dark">All Products</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/products/category/pain-relief" class="text-dark">
                                    Pain Relief <span class="badge bg-primary float-end">15</span>
                                </a>
                            </li>
                            <!-- Add more categories -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">
                    <!-- Repeat this product card for each product -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top" alt="Product">
                            <div class="card-body">
                                <h5 class="card-title">Product Name</h5>
                                <p class="card-text text-muted small">Product description</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-primary">$12.99</span>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End product card -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection