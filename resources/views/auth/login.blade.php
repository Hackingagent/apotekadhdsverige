@extends('layouts.app')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-prescription-bottle-alt fa-3x text-primary mb-3"></i>
                            <h2 class="fw-bold">Sign In</h2>
                            <p class="text-muted">Access your account to manage orders and prescriptions</p>
                        </div>

                        <form>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="customer@example.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" value="password">
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" checked>
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                                <a href="/forgot-password" class="text-primary">Forgot Password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                <a href="/user/dashboard">Signin</a>
                            </button>

                            <div class="text-center">
                                <p class="text-muted mb-0">Don't have an account? <a href="/register" class="text-primary">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection