@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>

        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">About PharmaCare</h1>
                <p class="lead mb-4">Your trusted partner in health and wellness, providing quality medicines and healthcare products since 2010.</p>
            </div>
            <div class="col-lg-6">
                <img src="/images/about-hero.jpg" alt="About PharmaCare" class="img-fluid rounded">
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-primary text-white">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-3">Our Mission</h3>
                                <p class="mb-0">To provide convenient access to authentic medicines and healthcare products, delivered with care and professionalism to support our customers' health and wellbeing.</p>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <img src="/images/mission-icon.png" alt="Our Mission" height="80">
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
                <p>We partner with licensed manufacturers and distributors to bring you genuine medications at affordable prices, delivered right to your doorstep.</p>
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
                                <h5 class="mb-1">Authentic Products</h5>
                                <p class="mb-0">100% genuine medicines sourced directly from manufacturers</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-check text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Licensed Pharmacists</h5>
                                <p class="mb-0">Our team of pharmacists is available for consultation</p>
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

        <div class="row mb-5">
            <div class="col-12">
                <h2 class="fw-bold mb-4">Our Team</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="/images/team/team-1.jpg" class="card-img-top" alt="Dr. Sarah Johnson">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Dr. Sarah Johnson</h5>
                                <p class="text-muted small">Chief Pharmacist</p>
                                <p class="card-text small">With over 15 years of experience in pharmaceutical care and medication therapy management.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="/images/team/team-2.jpg" class="card-img-top" alt="Michael Chen">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Michael Chen</h5>
                                <p class="text-muted small">Operations Manager</p>
                                <p class="card-text small">Ensuring smooth operations and timely delivery of your medications.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="/images/team/team-3.jpg" class="card-img-top" alt="Lisa Rodriguez">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">Lisa Rodriguez</h5>
                                <p class="text-muted small">Customer Care</p>
                                <p class="card-text small">Dedicated to providing exceptional service and support to our customers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="/images/team/team-4.jpg" class="card-img-top" alt="David Wilson">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">David Wilson</h5>
                                <p class="text-muted small">IT & Security</p>
                                <p class="card-text small">Protecting your data and ensuring a secure online shopping experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-light">
            <div class="card-body p-4 text-center">
                <h3 class="fw-bold mb-3">Have questions about our pharmacy?</h3>
                <p class="mb-4">Our team is here to help you with any questions about medications, health products, or your orders.</p>
                <a href="/contact" class="btn btn-primary px-4">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection