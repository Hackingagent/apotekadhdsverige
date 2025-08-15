@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">About PharmaCare</h1>
                <p class="lead mb-4">Your trusted partner in health and wellness since 2010.</p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                     alt="About Us" class="img-fluid rounded shadow">
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-primary text-white">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-3">Our Mission</h3>
                                <p class="mb-0">To provide convenient access to authentic medicines with care and professionalism.</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <i class="fas fa-bullseye fa-4x opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Our Story</h2>
                <p>Founded in 2010 by a team of pharmacists, PharmaCare began as a single neighborhood pharmacy with a vision to make healthcare more accessible. Today, we've grown into a trusted online pharmacy serving customers nationwide.</p>
                <p>Our journey has been guided by our core values of integrity, professionalism, and customer care. Every product we offer is carefully selected and verified to ensure the highest standards of quality and safety.</p>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">Why Choose Us?</h3>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Licensed Pharmacists</h5>
                                <p class="mb-0">Our team is available for consultation</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Fast Delivery</h5>
                                <p class="mb-0">Reliable delivery within 24-48 hours</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Secure Payments</h5>
                                <p class="mb-0">Safe and secure payment options</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-light">
            <div class="card-body p-4 text-center">
                <h3 class="fw-bold mb-3">Have questions about our pharmacy?</h3>
                <p class="mb-4">Our team is here to help you with any questions about medications or your orders.</p>
                <a href="/contact" class="btn btn-primary px-4">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection