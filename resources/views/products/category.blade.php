@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold mb-0">{{ $category->name }}</h1>
            <div class="text-muted">
                {{ $products->total() }} products found
            </div>
        </div>

        @if($category->description)
        <div class="alert alert-info mb-4">
            {{ $category->description }}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-3">
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

                        <h6 class="mb-3">Prescription</h6>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="prescriptionRequired">
                            <label class="form-check-label" for="prescriptionRequired">Prescription Required</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="prescriptionNotRequired" checked>
                            <label class="form-check-label" for="prescriptionNotRequired">No Prescription Needed</label>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Subcategories</h5>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($subcategories as $subcategory)
                            <li class="list-group-item">
                                <a href="/products/category/{{ $category->slug }}/{{ $subcategory->slug }}" class="text-dark">
                                    {{ $subcategory->name }} <span class="badge bg-primary float-end">{{ $subcategory->products_count }}</span>
                                </a>
                            </li>
                            @endforeach
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
                            <div class="badge bg-danger position-absolute top-0 end-0 m-2">Rx Only</div>
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

    // Filter functionality
    document.getElementById('prescriptionRequired').addEventListener('change', applyFilters);
    document.getElementById('prescriptionNotRequired').addEventListener('change', applyFilters);

    function applyFilters() {
        const prescriptionRequired = document.getElementById('prescriptionRequired').checked;
        const prescriptionNotRequired = document.getElementById('prescriptionNotRequired').checked;
        const minPrice = document.getElementById('priceMin').value;
        const maxPrice = document.getElementById('priceMax').value;

        // Here you would typically make an AJAX call to filter products
        // For now we'll just reload the page with query parameters
        const url = new URL(window.location.href);
        url.searchParams.set('prescription_required', prescriptionRequired);
        url.searchParams.set('prescription_not_required', prescriptionNotRequired);
        url.searchParams.set('min_price', minPrice);
        url.searchParams.set('max_price', maxPrice);

        window.location.href = url.toString();
    }
</script>
@endpush