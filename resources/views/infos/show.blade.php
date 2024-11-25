@extends('layouts.app')

@section('content')
<div class="container mt-5" style="padding-top: 50px;">
    <h1 class="mb-4 text-center display-4">
        <i class="bi bi-info-circle text-primary me-2"></i> {{ $info->title }}
    </h1>
    <div class="card hover-shadow border-0">
        <div class="card-body">
            <p class="card-text" style="font-size: 1.125rem; line-height: 1.7;">
                {!! nl2br(e($info->content)) !!}
            </p>
            <div class="text-center mt-4">
                <a href="{{ route('info.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .hover-shadow {
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow default yang lebih ringan */
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3); /* Shadow lebih tebal saat di-hover */
    }

    .card {
        border-radius: 15px;
        margin-top: 30px;
    }

    .card-body {
        padding: 30px;
        font-family: 'Arial', sans-serif;
        line-height: 1.7;
    }

    .card-text {
        font-size: 1.125rem;
    }

    /* Style for smaller screens */
    @media (max-width: 576px) {
        .card-body {
            padding: 20px;
        }

        .card-text {
            font-size: 1rem;
        }
    }
</style>
@endsection
