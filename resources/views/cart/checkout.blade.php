@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Delivery Information</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="John">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Doe">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="john@example.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" value="(123) 456-7890">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" value="123 Main St">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" value="Medical City">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">State</label>
                                    <select class="form-select">
                                        <option>California</option>
                                        <option selected>New York</option>
                                        <option>Texas</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">ZIP</label>
                                    <input type="text" class="form-control" value="10001">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Payment Method</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment" id="creditCard" checked>
                            <label class="form-check-label" for="creditCard">
                                Credit/Debit Card
                            </label>
                        </div>

                        <div id="creditCardForm">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-control" value="4242 4242 4242 4242">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Name on Card</label>
                                    <input type="text" class="form-control" value="John Doe">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Expiry</label>
                                    <input type="text" class="form-control" placeholder="MM/YY" value="12/25">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">CVV</label>
                                    <input type="text" class="form-control" placeholder="123" value="123">
                                </div>
                            </div>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="payment" id="paypal">
                            <label class="form-check-label" for="paypal">
                                <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" alt="PayPal" class="ms-2">
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
                            <label class="form-label">Upload Prescription</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="prescriptionCheck" required>
                            <label class="form-check-label" for="prescriptionCheck">
                                I confirm that I have a valid prescription for all prescription medications
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
                                <thead class="bg-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Pain Relief Tablets <br>
                                            <small class="text-muted">Qty: 1 × $12.99</small>
                                        </td>
                                        <td class="text-end">$12.99</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Vitamin C Capsules <br>
                                            <small class="text-muted">Qty: 2 × $8.50</small>
                                        </td>
                                        <td class="text-end">$17.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td class="text-end">$29.99</td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td class="text-end">$3.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td class="text-end">Free</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <th>Total</th>
                                        <td class="text-end">$32.99</td>
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
                                I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="privacyCheck" required>
                            <label class="form-check-label" for="privacyCheck">
                                I agree to the <a href="#" class="text-primary">Privacy Policy</a>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    <i class="fas fa-lock me-2"></i> Place Order
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Payment method toggle
document.querySelectorAll('input[name="payment"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.id === 'creditCard') {
            document.getElementById('creditCardForm').style.display = 'block';
        } else {
            document.getElementById('creditCardForm').style.display = 'none';
        }
    });
});
</script>
@endsection