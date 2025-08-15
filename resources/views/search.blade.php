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

        <h1 class="fw-bold mb-4">Search Results for "{{ $query }}"</h1>

        @if($products->isEmpty())
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-search fa-4x text-muted mb-4"></i>
                <h3 class="mb-3">No products found</h3>
                <p class="text-muted mb-4">We couldn't find any products matching your search.</p>
                <a href="/products" class="btn btn-primary">Browse All Products</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Filter Results</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">Categories</h6>
                        <ul class="list-unstyled">
                            @foreach($categories as $category)
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="category-{{ $category->id }}" name="categories[]" value="{{ $category->id }}"
                                        {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                        {{ $category->name }} <span class="text-muted">({{ $category->products_count }})</span>
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <h6 class="mb-3 mt-4">Price Range</h6>
                        <div class="range-slider mb-4">
                            <input type="range" class="form-range" min="0" max="500" step="5" id="priceMin" value="{{ request('min_price', 0) }}">
                            <input type="range" class="form-range" min="0" max="500" step="5" id="priceMax" value="{{ request('max_price', 500) }}">
                            <div class="d-flex justify-content-between mt-2">
                                <span id="priceMinValue">${{ request('min_price', 0) }}</span>
                                <span id="priceMaxValue">${{ request('max_price', 500) }}</span>
                            </div>
                        </div>

                        <button type="button" id="applyFilters" class="btn btn-primary w-100">Apply Filters</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="text-muted">
                        {{ $products->total() }} results found
                    </div>
                    <div class="me-3">
                        <span class="me-2">Sort by:</span>
                        <div class="btn-group">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Relevance
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'relevance']) }}">Relevance</a></li>
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">Price: Low to High</a></li>
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">Price: High to Low</a></li>
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}">Newest First</a></li>
                                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'rating']) }}">Customer Rating</a></li>
                            </ul>
                        </div>
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
                    {{ $products->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
        @endif
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

    // Apply filters
    document.getElementById('applyFilters').addEventListener('click', function() {
        const url = new URL(window.location.href);

        // Get selected categories
        const selectedCategories = [];
        document.querySelectorAll('input[name="categories[]"]:checked').forEach(checkbox => {
            selectedCategories.push(checkbox.value);
        });

        // Update URL parameters
        url.searchParams.set('categories', selectedCategories.join(','));
        url.searchParams.set('min_price', priceMin.value);
        url.searchParams.set('max_price', priceMax.value);

        window.location.href = url.toString();
    });
</script>
@endpush