<div class="card mb-4">
    <div class="card-body text-center">
        <img src="{{ Auth::user()->avatar ?? '/images/user-default.png' }}" alt="Profile" class="rounded-circle mb-3" width="120" height="120">
        <h5 class="card-title mb-1">{{ Auth::user()->name }}</h5>
        <p class="text-muted small mb-3">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
        <div class="d-flex justify-content-center gap-2">
            <a href="/user/profile" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-user-edit me-1"></i> Edit
            </a>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Menu</h5>
    </div>
    <div class="list-group list-group-flush">
        <a href="/user/dashboard" class="list-group-item list-group-item-action {{ Request::is('user/dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="/user/orders" class="list-group-item list-group-item-action {{ Request::is('user/orders*') ? 'active' : '' }}">
            <i class="fas fa-shopping-bag me-2"></i> My Orders
        </a>
        <a href="/user/prescriptions" class="list-group-item list-group-item-action {{ Request::is('user/prescriptions*') ? 'active' : '' }}">
            <i class="fas fa-file-prescription me-2"></i> Prescriptions
        </a>
        <a href="/user/profile" class="list-group-item list-group-item-action {{ Request::is('user/profile*') ? 'active' : '' }}">
            <i class="fas fa-user me-2"></i> Profile
        </a>
        <a href="/user/addresses" class="list-group-item list-group-item-action {{ Request::is('user/addresses*') ? 'active' : '' }}">
            <i class="fas fa-map-marker-alt me-2"></i> Addresses
        </a>
        <a href="/user/payment-methods" class="list-group-item list-group-item-action {{ Request::is('user/payment-methods*') ? 'active' : '' }}">
            <i class="fas fa-credit-card me-2"></i> Payment Methods
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action border-0">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
</div>