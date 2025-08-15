@extends('layouts.app')

@section('content')
<div class="hero-section bg-primary bg-opacity-10 py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Your Health is Our Priority</h1>
                <p class="lead mb-4">Get authentic medicines delivered to your doorstep with just a few clicks.</p>
                <a href="/products" class="btn btn-primary btn-lg px-4 me-2">Shop Now</a>
                <a href="/about" class="btn btn-outline-primary btn-lg px-4">Learn More</a>
            </div>
            <div class="col-lg-6">
                <img src="/images/hero-pharmacy.png" alt="Pharmacy" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt text-primary fs-4"></i>
                        </div>
                        <h5 class="card-title">Authentic Medicines</h5>
                        <p class="card-text">100% genuine products sourced directly from manufacturers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-truck text-primary fs-4"></i>
                        </div>
                        <h5 class="card-title">Fast Delivery</h5>
                        <p class="card-text">Get your order delivered within 24-48 hours.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-headset text-primary fs-4"></i>
                        </div>
                        <h5 class="card-title">24/7 Support</h5>
                        <p class="card-text">Our pharmacists are always ready to assist you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Featured Products</h2>
            <a href="/products" class="btn btn-outline-primary">View All</a>
        </div>
        <div class="row g-4">
            {{-- @foreach($featuredProducts as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100">
                    <div class="badge bg-danger position-absolute top-0 end-0 m-2">Hot</div>
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
                                <span class="text-muted ms-1">(24)</span>
                            </div>
                        </div>
                        <h5 class="card-title"><a href="/products/{{ $product->slug }}" class="text-dark">{{ $product->name }}</a></h5>
                        <p class="card-text text-muted small">{{ Str::limit($product->description, 60) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold text-primary">${{ $product->price }}</span>
                            <button class="btn btn-sm btn-outline-primary add-to-cart" data-id="{{ $product->id }}">
                                <i class="fas fa-cart-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach --}}

            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100">
                    <img src="https://via.placeholder.com/300x300?text=Pain+Relief" class="card-img-top" alt="Pain Relief">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="text-muted small">Pain Relief</span>
                            <div class="rating small text-warning">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                <span class="text-muted ms-1">(24)</span>
                            </div>
                        </div>
                        <h5 class="card-title"><a href="/products/pain-relief" class="text-dark">Pain Relief Tablets</a></h5>
                        <p class="card-text text-muted small">Fast-acting pain relief for headaches and minor aches</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="fw-bold text-primary">$12.99</span>
                            <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-cart-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="/images/pharmacist.jpg" alt="Pharmacist" class="img-fluid rounded">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Consult Our Pharmacists</h2>
                <p class="lead">Have questions about your medications? Our licensed pharmacists are available to provide expert advice.</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Free medication counseling</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Drug interaction checks</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Dosage guidance</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Side effect information</li>
                </ul>
                <a href="/contact" class="btn btn-primary px-4">Contact Pharmacist</a>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Subscribe to Our Newsletter</h2>
        <p class="lead mb-5">Get the latest updates on health tips, new products, and exclusive offers.</p>
        <form class="row g-2 justify-content-center">
            <div class="col-md-6">
                <input type="email" class="form-control form-control-lg" placeholder="Your email address">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-light btn-lg w-100">Subscribe</button>
            </div>
        </form>
    </div>
</section>
@endsection