@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                             alt="Pain Relief Tablets" class="img-fluid rounded" style="max-height: 400px;">
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="alert alert-warning mb-4">
                            <i class="fas fa-exclamation-triangle me-2"></i> This product requires a prescription.
                        </div>

                        <h1 class="h2 fw-bold">Pain Relief Tablets</h1>
                        <div class="d-flex align-items-center mb-3">
                            <div class="rating text-warning me-2">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-muted">(24 reviews)</span>
                        </div>

                        <div class="mb-4">
                            <span class="h3 fw-bold text-primary">$12.99</span>
                            <span class="text-decoration-line-through text-muted ms-2">$15.99</span>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold me-2">Availability:</span>
                                <span class="text-success"><i class="fas fa-check-circle me-1"></i> In Stock (50 available)</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold me-2">Category:</span>
                                <a href="/products/category/pain-relief" class="text-primary">Pain Relief</a>
                            </div>
                        </div>

                        <p>Effective pain relief for headaches, backaches, muscle aches, and minor arthritis pain. Provides up to 8 hours of relief per dose.</p>

                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">Key Features:</h5>
                            <ul>
                                <li>Fast-acting formula begins working in 30 minutes</li>
                                <li>Non-prescription strength</li>
                                <li>Non-drowsy formula</li>
                                <li>Alcohol-free</li>
                            </ul>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="input-group me-3" style="width: 120px;">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                                <input type="text" class="form-control text-center" value="1">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                            </div>
                            <button class="btn btn-primary flex-grow-1 add-to-cart">
                                <i class="fas fa-cart-plus me-2"></i> Add to Cart
                            </button>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-heart me-2"></i> Add to Wishlist
                            </button>
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-share-alt me-2"></i> Share
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#details">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#directions">Directions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#reviews">Reviews (24)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div id="details">
                            <h5 class="fw-bold">Product Information</h5>
                            <p>Each tablet contains 500mg of the active ingredient. Suitable for adults and children over 12 years. Store below 25°C in a dry place.</p>

                            <h5 class="fw-bold mt-4">Ingredients</h5>
                            <p>Active ingredient: Ibuprofen. Inactive ingredients: Microcrystalline cellulose, corn starch, hypromellose, titanium dioxide, polyethylene glycol.</p>
                        </div>

                        <div id="directions" style="display:none;">
                            <h5 class="fw-bold">Directions for Use</h5>
                            <p>Take 1-2 tablets every 4-6 hours while symptoms persist. Do not exceed 6 tablets in 24 hours unless directed by a doctor.</p>
                        </div>

                        <div id="reviews" style="display:none;">
                            <div class="mb-4">
                                <h5 class="fw-bold">Customer Reviews</h5>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> These are demo reviews. Actual reviews will appear here when you implement the backend.
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <strong>John D.</strong>
                                        <small class="text-muted">January 15, 2023</small>
                                    </div>
                                    <div class="rating text-warning small">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                    <p class="mb-0">Works great for my back pain!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Tab functionality
document.querySelectorAll('.nav-tabs .nav-link').forEach(tab => {
    tab.addEventListener('click', function(e) {
        e.preventDefault();

        // Hide all content
        document.querySelectorAll('[id^="details"], [id^="directions"], [id^="reviews"]').forEach(content => {
            content.style.display = 'none';
        });

        // Show selected content
        const target = this.getAttribute('href');
        document.querySelector(target).style.display = 'block';

        // Update active tab
        document.querySelectorAll('.nav-tabs .nav-link').forEach(t => {
            t.classList.remove('active');
        });
        this.classList.add('active');
    });
});
</script>
@endsection