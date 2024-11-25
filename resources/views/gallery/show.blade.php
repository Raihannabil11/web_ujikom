@extends('layouts.app')

@section('content')
<div class="container mt-5" style="padding-top: 50px;">
    <h1 class="mb-4 text-center display-4">
        <i class="bi bi-images me-2 text-primary"></i> {{ $gallery->title }}
    </h1>
    <p class="lead text-center">
        <i class="bi bi-card-image me-1"></i> Jumlah Foto: {{ $gallery->photos->count() }}
    </p>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach($gallery->photos as $photo)
            <div class="col">
                <div class="card hover-shadow border-0">
                    <img src="{{ $photo->image_url }}" 
                         class="card-img-top img-fluid" 
                         alt="{{ $photo->title }}" 
                         style="height: 180px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="bi bi-file-earmark-text me-2 text-warning"></i> {{ $photo->title }}
                        </h5>
                        <p class="card-text">
                            <i class="bi bi-info-circle me-1"></i> 
                            {{ $photo->description ?? 'Tidak ada deskripsi.' }}
                        </p>
                        <a href="{{ route('photos.show', $photo->id) }}" class="btn btn-outline-primary">
                            <i class="bi bi-eye me-1"></i> View Photo
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
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
        border-radius: 10px;
        overflow: hidden;
    }

    .card-img-top {
        border-radius: 10px 10px 0 0;
        height: 180px;
    }

    .card-body {
        padding: 15px;
    }

    .container {
        max-width: 1200px;
    }

    /* Style for smaller screens */
    @media (max-width: 576px) {
        .card-body {
            padding: 12px;
        }

        .card-title {
            font-size: 1rem;
        }

        .card-text {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
