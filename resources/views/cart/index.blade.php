@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </nav>

        <h1 class="fw-bold mb-4">Your Shopping Cart</h1>

        @if(Cart::count() > 0)
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0" scope="col">Product</th>
                                        <th class="border-0" scope="col">Price</th>
                                        <th class="border-0" scope="col">Quantity</th>
                                        <th class="border-0" scope="col">Total</th>
                                        <th class="border-0" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item->model->image }}" alt="{{ $item->model->name }}" class="img-fluid rounded" style="width: 70px;">
                                                <div class="ms-3">
                                                    <h6 class="mb-1"><a href="/products/{{ $item->model->slug }}" class="text-dark">{{ $item->model->name }}</a></h6>
                                                    <p class="text-muted small mb-0">{{ $item->model->category->name }}</p>
                                                    @if($item->model->is_prescription_required)
                                                    <span class="badge bg-danger small">Prescription Required</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>${{ $item->price }}</td>
                                        <td>
                                            <div class="input-group" style="width: 120px;">
                                                <button class="btn btn-outline-secondary btn-sm update-cart" data-rowid="{{ $item->rowId }}" data-action="decrease">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="text" class="form-control form-control-sm text-center quantity-input" value="{{ $item->qty }}" data-rowid="{{ $item->rowId }}">
                                                <button class="btn btn-outline-secondary btn-sm update-cart" data-rowid="{{ $item->rowId }}" data-action="increase">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>${{ $item->subtotal }}</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-danger remove-from-cart" data-rowid="{{ $item->rowId }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button class="btn btn-primary" type="button">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/products" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                    </a>
                    <a href="/cart/checkout" class="btn btn-primary">
                        Proceed to Checkout <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>${{ Cart::subtotal() }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax</span>
                            <span>${{ Cart::tax() }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount</span>
                            <span>$0.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total</span>
                            <span>${{ Cart::total() }}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-3">We Accept</h6>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <img src="/images/payment/visa.png" alt="Visa" height="30">
                            <img src="/images/payment/mastercard.png" alt="Mastercard" height="30">
                            <img src="/images/payment/amex.png" alt="American Express" height="30">
                            <img src="/images/payment/paypal.png" alt="PayPal" height="30">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="termsCheck" checked>
                            <label class="form-check-label small" for="termsCheck">
                                I agree to the <a href="/terms" class="text-primary">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="privacyCheck" checked>
                            <label class="form-check-label small" for="privacyCheck">
                                I agree to the <a href="/privacy" class="text-primary">Privacy Policy</a>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    // Update cart quantity
    document.querySelectorAll('.update-cart').forEach(button => {
        button.addEventListener('click', function() {
            const rowId = this.getAttribute('data-rowid');
            const action = this.getAttribute('data-action');
            const input = this.parentNode.querySelector('.quantity-input');
            let quantity = parseInt(input.value);

            if (action === 'increase') {
                input.value = quantity + 1;
            } else if (action === 'decrease' && quantity > 1) {
                input.value = quantity - 1;
            }

            // Update cart via AJAX
            updateCart(rowId, input.value);
        });
    });

    // Handle direct input change
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            const rowId = this.getAttribute('data-rowid');
            const quantity = this.value;

            if (quantity > 0) {
                updateCart(rowId, quantity);
            } else {
                this.value = 1;
            }
        });
    });

    // Remove item from cart
    document.querySelectorAll('.remove-from-cart').forEach(button => {
        button.addEventListener('click', function() {
            const rowId = this.getAttribute('data-rowid');

            fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ rowId: rowId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        });
    });

    function updateCart(rowId, quantity) {
        fetch('/cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                rowId: rowId,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
</script>
@endpush