@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('user.partials.sidebar')
            </div>

            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-3 text-center">
                                    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80"
                                         alt="Profile" class="rounded-circle mb-3" width="120" height="120" id="avatarPreview">
                                    <div>
                                        <button type="button" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-camera me-1"></i> Change Photo
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-9">
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
                                            <input type="email" class="form-control" value="john.doe@example.com">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Phone</label>
                                            <input type="tel" class="form-control" value="(123) 456-7890">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Address Book</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Primary Address -->
                            <div class="col-md-6 mb-4">
                                <div class="card border-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h6 class="fw-bold mb-0">Primary Address</h6>
                                            <button class="btn btn-sm btn-outline-primary">Edit</button>
                                        </div>
                                        <p>
                                            John Doe<br>
                                            123 Main Street<br>
                                            Medical City, NY 10001<br>
                                            United States<br>
                                            (123) 456-7890
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Address -->
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h6 class="fw-bold mb-0">Work Address</h6>
                                            <div>
                                                <button class="btn btn-sm btn-outline-secondary me-1">Edit</button>
                                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                                            </div>
                                        </div>
                                        <p>
                                            John Doe<br>
                                            456 Business Ave<br>
                                            Suite 200<br>
                                            Medical City, NY 10001<br>
                                            (123) 555-7890
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-outline-primary">
                            <i class="fas fa-plus me-2"></i> Add New Address
                        </button>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Account Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="fw-bold mb-1">Download Your Data</h6>
                                <p class="small text-muted mb-0">Request a copy of your personal data</p>
                            </div>
                            <button class="btn btn-outline-secondary">
                                Request Download
                            </button>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fw-bold mb-1">Delete Account</h6>
                                <p class="small text-muted mb-0">Permanently remove your account and all data</p>
                            </div>
                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                <div class="mb-3">
                    <label class="form-label">Enter your password to confirm</label>
                    <input type="password" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete Account</button>
            </div>
        </div>
    </div>
</div>

<script>
// Profile photo upload preview
document.querySelector('input[type="file"]')?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('avatarPreview').src = event.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection