@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <h1 class="fw-bold mb-4">Our Products</h1>

        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/products" class="text-dark">All Products</a>
                            </li>
                            @foreach($categories as $category)
                            <li class="list-group-item">
                                <a href="/products/category/{{ $category->slug }}" class="text-dark">
                                    {{ $category->name }} <span class="badge bg-primary float-end">{{ $category->products_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Filter</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">Price Range</h6>
                        <div class="range-slider mb-4">
                            <input type="range" class="form-range" min="0" max="500" step="5" id="priceMin" value="0">
                            <input type="range" class="form-range" min="0" max="500" step="5" id="priceMax" value="500">
                            <div class="d-flex justify-content-between mt-2">
                                <span id="priceMinValue">$0</span>
                                <span id="priceMaxValue">$500</span>
                            </div>
                        </div>

                        <h6 class="mb-3">Availability</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="inStock" checked>
                            <label class="form-check-label" for="inStock">In Stock</label>
                        </div>

                        <h6 class="mb-3">Prescription</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="prescription" id="prescriptionAll" checked>
                            <label class="form-check-label" for="prescriptionAll">All</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="prescription" id="prescriptionRequired">
                            <label class="form-check-label" for="prescriptionRequired">Prescription Required</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="prescription" id="prescriptionNotRequired">
                            <label class="form-check-label" for="prescriptionNotRequired">No Prescription Needed</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="me-3">
                        <span class="me-2">Sort by:</span>
                        <div class="btn-group">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Popularity
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Popularity</a></li>
                                <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                                <li><a class="dropdown-item" href="#">Newest First</a></li>
                                <li><a class="dropdown-item" href="#">Customer Rating</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-muted">
                        Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products
                    </div>
                </div>

                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-md-6 col-xl-4">
                        <div class="card product-card h-100">
                            @if($product->is_prescription_required)
                            <div class="badge bg-danger position-absolute top-0 start-0 m-2">Rx Only</div>
                            @endif
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <a href="/products/category/{{ $product->category->slug }}" class="text-muted small">{{ $product->category->name }}</a>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-muted ms-1">({{ $product->reviews_count }})</span>
                                    </div>
                                </div>
                                <h5 class="card-title"><a href="/products/{{ $product->slug }}" class="text-dark">{{ $product->name }}</a></h5>
                                <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-primary">${{ $product->price }}</span>
                                    @if($product->stock > 0)
                                    <button class="btn btn-sm btn-outline-primary add-to-cart" data-id="{{ $product->id }}">
                                        <i class="fas fa-cart-plus"></i> Add
                                    </button>
                                    @else
                                    <span class="badge bg-secondary">Out of Stock</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Price range slider functionality
    const priceMin = document.getElementById('priceMin');
    const priceMax = document.getElementById('priceMax');
    const priceMinValue = document.getElementById('priceMinValue');
    const priceMaxValue = document.getElementById('priceMaxValue');

    priceMin.addEventListener('input', function() {
        priceMinValue.textContent = '$' + this.value;
        if (parseInt(priceMax.value) < parseInt(this.value)) {
            priceMax.value = this.value;
            priceMaxValue.textContent = '$' + this.value;
        }
    });

    priceMax.addEventListener('input', function() {
        priceMaxValue.textContent = '$' + this.value;
        if (parseInt(priceMin.value) > parseInt(this.value)) {
            priceMin.value = this.value;
            priceMinValue.textContent = '$' + this.value;
        }
    });
</script>
@endpush