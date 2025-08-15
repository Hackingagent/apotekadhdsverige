@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search Results</li>
            </ol>
        </nav>

        <h1 class="fw-bold mb-4">Search Results for "pain relief"</h1>

        <div class="row">
            <div class="col-lg-3">
                <!-- Search Filters -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Refine Search</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Search Term</label>
                            <input type="text" class="form-control" value="pain relief">
                        </div>

                        <h6 class="mb-3">Categories</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="cat1" checked>
                            <label class="form-check-label" for="cat1">Pain Relief (12)</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="cat2">
                            <label class="form-check-label" for="cat2">First Aid (3)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat3">
                            <label class="form-check-label" for="cat3">Vitamins (2)</label>
                        </div>

                        <button class="btn btn-primary w-100 mt-3">Update Results</button>
                    </div>
                </div>

                <!-- Popular Searches -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Popular Searches</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="/search?query=headache" class="text-primary">Headache relief</a></li>
                            <li class="mb-2"><a href="/search?query=allergy" class="text-primary">Allergy medicine</a></li>
                            <li><a href="/search?query=vitamin+c" class="text-primary">Vitamin C</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-muted">12 results found</div>
                    <div class="me-3">
                        <span class="me-2">Sort by:</span>
                        <div class="btn-group">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Relevance
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Relevance</a></li>
                                <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Search Results -->
                <div class="row g-4">
                    <!-- Product 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card product-card h-100">
                            <div class="badge bg-danger position-absolute top-0 end-0 m-2">Rx</div>
                            <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                                 class="card-img-top" alt="Pain Relief">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/products/pain-relief" class="text-dark">Pain Relief Tablets</a></h5>
                                <p class="card-text text-muted small">For headaches and minor aches</p>
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

                    <!-- Add more search results -->
                </div>

                <!-- No Results State (hidden by default) -->
                <div class="text-center py-5" style="display: none;">
                    <i class="fas fa-search fa-4x text-muted mb-4"></i>
                    <h3 class="mb-3">No products found</h3>
                    <p class="text-muted mb-4">Try adjusting your search or filters</p>
                    <a href="/products" class="btn btn-primary">Browse All Products</a>
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
@endsection