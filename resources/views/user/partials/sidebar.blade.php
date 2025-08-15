<div class="card mb-4">
    <div class="card-body text-center">
        <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80"
             alt="Profile" class="rounded-circle mb-3" width="120" height="120">
        <h5 class="card-title mb-1">John Doe</h5>
        <p class="text-muted small mb-3">Member since Jan 2023</p>
        <a href="/user/profile" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-user-edit me-1"></i> Edit Profile
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="list-group list-group-flush">
        <a href="/user/dashboard" class="list-group-item list-group-item-action active">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="/user/orders" class="list-group-item list-group-item-action">
            <i class="fas fa-shopping-bag me-2"></i> My Orders
        </a>
        <a href="/user/prescriptions" class="list-group-item list-group-item-action">
            <i class="fas fa-file-prescription me-2"></i> Prescriptions
        </a>
        <a href="/user/profile" class="list-group-item list-group-item-action">
            <i class="fas fa-user me-2"></i> Profile
        </a>
        <a href="/user/addresses" class="list-group-item list-group-item-action">
            <i class="fas fa-map-marker-alt me-2"></i> Addresses
        </a>
        <form method="POST" action="#">
            <button type="submit" class="list-group-item list-group-item-action border-0">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
</div>