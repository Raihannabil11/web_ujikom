@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-8 col-lg-6 col-xl-4">
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST" action="{{ route('login.store') }}" class="p-4 shadow-lg rounded bg-white">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your email">
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Enter your password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3 shadow-sm">Login</button>
            <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </form>
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Style for the login container */
    .vh-100 {
        height: 100vh;
    }

    .shadow-lg {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-size: 1rem;
        font-weight: 500;
    }

    /* Responsive design adjustments */
    @media (max-width: 576px) {
        .col-md-8 {
            width: 90%;
        }
    }

    /* Button hover and animation */
    .btn-primary {
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Styling for form elements */
    .input-group-text {
        background-color: #f1f1f1;
    }

    .form-control {
        border-radius: 8px;
    }

    .p-4 {
        padding: 2rem;
    }
</style>
@endsection
