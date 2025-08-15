@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">Get in Touch</h3>
                        <p class="mb-4">Have questions about our products or services? Our team is ready to help you.</p>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Address</h5>
                                <p class="mb-0">123 Health Street, Medical City, MC 12345</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-phone text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Phone</h5>
                                <p class="mb-0">(123) 456-7890</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-envelope text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-0">info@pharmacare.com</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fas fa-clock text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-1">Hours</h5>
                                <p class="mb-0">Monday-Friday: 8AM-8PM<br>Saturday-Sunday: 9AM-6PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">Send Us a Message</h3>

                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Your Name</label>
                                    <input type="text" class="form-control" value="John Doe">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="john@example.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" value="Question about products">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="5">I have a question about...</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="map-container" style="height: 400px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256012066!2d-73.98784468459382!3d40.74844017932793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1623861234567!5m2!1sen!2sus"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection