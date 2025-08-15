@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/cart">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>

        <h1 class="fw-bold mb-4">Checkout</h1>

        @if(Cart::count() > 0)
        <form id="checkoutForm" action="/cart/place-order" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Delivery Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" value="{{ Auth::user()->first_name ?? '' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" value="{{ Auth::user()->last_name ?? '' }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address ?? '' }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ Auth::user()->city ?? '' }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" id="state" name="state" required>
                                        <option value="">Choose...</option>
                                        <option value="AL" {{ (Auth::user()->state ?? '') == 'AL' ? 'selected' : '' }}>Alabama</option>
                                        <!-- Add all other states -->
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="zip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip" value="{{ Auth::user()->zip ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Payment Method</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="creditCard" value="credit_card" checked>
                                <label class="form-check-label" for="creditCard">
                                    Credit/Debit Card
                                </label>
                            </div>
                            <div id="creditCardForm">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="cardNumber" class="form-label">Card Number</label>
                                        <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cardName" class="form-label">Name on Card</label>
                                        <input type="text" class="form-control" id="cardName" placeholder="John Smith">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cardExpiry" class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cardCvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cardCvv" placeholder="123">
                                    </div>
                                </div>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                                <label class="form-check-label" for="paypal">
                                    <img src="/images/payment/paypal.png" alt="PayPal" height="20" class="ms-2">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Prescription Upload</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i> Prescription is required for prescription drugs in your order.
                            </div>
                            <div class="mb-3">
                                <label for="prescriptionFile" class="form-label">Upload Prescription</label>
                                <input class="form-control" type="file" id="prescriptionFile" name="prescription">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="prescriptionCheck" required>
                                <label class="form-check-label" for="prescriptionCheck">
                                    I confirm that I have a valid prescription from a licensed healthcare provider for all prescription medications in my order.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::content() as $item)
                                        <tr>
                                            <td>
                                                {{ $item->name }} <br>
                                                <small class="text-muted">Qty: {{ $item->qty }} × ${{ $item->price }}</small>
                                            </td>
                                            <td class="text-end">${{ $item->subtotal }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td class="text-end">${{ Cart::subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td class="text-end">${{ Cart::tax() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td class="text-end">Free</td>
                                        </tr>
                                        <tr class="fw-bold">
                                            <th>Total</th>
                                            <td class="text-end">${{ Cart::total() }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">
                                    I agree to the <a href="/terms" class="text-primary">Terms and Conditions</a>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="privacyCheck" required>
                                <label class="form-check-label" for="privacyCheck">
                                    I agree to the <a href="/privacy" class="text-primary">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg">
                        <i class="fas fa-lock me-2"></i> Place Order
                    </button>
                </div>
            </div>
        </form>
        @else
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
                <h3 class="mb-3">Your cart is empty</h3>
                <p class="text-muted mb-4">Looks like you haven't added any items to your cart yet.</p>
                <a href="/products" class="btn btn-primary px-4">
                    <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Payment method toggle
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'credit_card') {
                document.getElementById('creditCardForm').style.display = 'block';
            } else {
                document.getElementById('creditCardForm').style.display = 'none';
            }
        });
    });

    // Form validation
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        const hasPrescriptionItems = {{ $hasPrescriptionItems ? 'true' : 'false' }};
        const prescriptionCheck = document.getElementById('prescriptionCheck');

        if (hasPrescriptionItems && !prescriptionCheck.checked) {
            e.preventDefault();
            alert('Please confirm that you have a valid prescription for all prescription medications in your order.');
            prescriptionCheck.focus();
        }
    });
</script>
@endpush