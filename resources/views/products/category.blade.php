@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pain Relief</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold mb-0">Pain Relief Medications</h1>
            <div class="text-muted">15 products</div>
        </div>

        <div class="alert alert-info mb-4">
            <i class="fas fa-info-circle me-2"></i> High-quality pain relief medications for headaches, muscle pain, and arthritis.
        </div>

        <div class="row">
            <div class="col-lg-3">
                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Filter By</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">Price Range</h6>
                        <div class="range-slider mb-4">
                            <input type="range" class="form-range" min="0" max="100" step="5" value="0" id="priceMin">
                            <input type="range" class="form-range" min="0" max="100" step="5" value="100" id="priceMax">
                            <div class="d-flex justify-content-between mt-2">
                                <span>$<span id="priceMinValue">0</span></span>
                                <span>$<span id="priceMaxValue">100</span></span>
                            </div>
                        </div>

                        <h6 class="mb-3">Type</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="tablets" checked>
                            <label class="form-check-label" for="tablets">Tablets</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="capsules" checked>
                            <label class="form-check-label" for="capsules">Capsules</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="creams" checked>
                            <label class="form-check-label" for="creams">Creams</label>
                        </div>
                    </div>
                </div>

                <!-- Health Tips -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Pain Relief Tips</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Stay hydrated</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Apply ice packs</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Gentle stretching</li>
                            <li><i class="fas fa-check-circle text-primary me-2"></i> Consult a doctor if pain persists</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="me-3">
                        <span class="me-2">Sort by:</span>
                        <div class="btn-group">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Best Selling
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Best Selling</a></li>
                                <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                                <li><a class="dropdown-item" href="#">Customer Rating</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-muted">
                        Showing 1-8 of 15 products
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Product 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card product-card h-100">
                            <div class="badge bg-danger position-absolute top-0 end-0 m-2">Rx Only</div>
                            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top" alt="Pain Relief Tablets">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/products/pain-relief-tablets" class="text-dark">Extra Strength Pain Reliever</a></h5>
                                <p class="card-text text-muted small">Fast-acting formula for headaches and muscle pain</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-primary">$12.99</span>
                                    <button class="btn btn-sm btn-outline-primary add-to-cart">
                                        <i class="fas fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1631815588090-7c4a01f0b6de?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top" alt="Pain Relief Cream">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/products/pain-relief-cream" class="text-dark">Muscle Relief Cream</a></h5>
                                <p class="card-text text-muted small">Topical analgesic for sore muscles</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-primary">$9.99</span>
                                    <button class="btn btn-sm btn-outline-primary add-to-cart">
                                        <i class="fas fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add 4-6 more products -->
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
// Price range slider functionality
const priceMin = document.getElementById('priceMin');
const priceMax = document.getElementById('priceMax');
const priceMinValue = document.getElementById('priceMinValue');
const priceMaxValue = document.getElementById('priceMaxValue');

priceMin.addEventListener('input', function() {
    priceMinValue.textContent = this.value;
});

priceMax.addEventListener('input', function() {
    priceMaxValue.textContent = this.value;
});
</script>
@endsection