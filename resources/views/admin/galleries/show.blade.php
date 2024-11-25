@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-image"></i> {{ $gallery->title }}</h1>

    <h2 class="mb-4"><i class="fas fa-camera"></i> Photos</h2>
    <a href="{{ route('dashboard.photos.create', ['gallery_id' => $gallery->id]) }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Add Photo
    </a>

    @if($gallery->photos->isEmpty())
        <p class="text-center">No photos available in this gallery.</p>
    @else
        <div class="row">
            @foreach($gallery->photos as $photo)
                <div class="col-md-4 col-sm-6 col-12 mb-4">
                    <div class="card shadow-sm border-light" style="height: 100%; border-radius: 8px;">
                        <img src="{{ $photo->image_url }}" class="card-img-top" alt="{{ $photo->title }}" style="object-fit: cover; height: 200px;" onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                        <div class="card-body">
                            <h5 class="card-title">{{ $photo->title }}</h5>
                            <p class="card-text text-truncate" style="height: 50px; overflow: hidden;">{{ $photo->description }}</p>
                            <div class="d-flex flex-column flex-sm-row justify-content-between">
                                <a href="{{ route('dashboard.photos.edit', $photo->id) }}" class="btn btn-warning btn-sm mb-2 mb-sm-0">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('dashboard.photos.destroy', $photo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this photo?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('dashboard.galleries.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Back to Galleries
    </a>
</div>
@endsection

<style>
    /* Responsif untuk perangkat kecil (mobile) */
    @media (max-width: 576px) {
        .card-img-top {
            height: 150px; /* Mengurangi tinggi gambar pada perangkat kecil */
        }

        .card-body {
            padding: 10px; /* Mengurangi padding pada card body untuk perangkat kecil */
        }

        .card-title {
            font-size: 1rem; /* Mengurangi ukuran font judul pada perangkat kecil */
        }

        .card-text {
            font-size: 0.875rem; /* Menyesuaikan ukuran font deskripsi pada perangkat kecil */
        }

        .btn {
            font-size: 0.8rem; /* Menyesuaikan ukuran font tombol pada perangkat kecil */
            width: 100%; /* Tombol mengambil lebar penuh pada perangkat kecil */
            margin-top: 5px; /* Memberikan jarak antar tombol */
        }

        .d-flex {
            flex-direction: column; /* Tombol-tombol ditampilkan dalam kolom pada perangkat kecil */
        }
    }

    /* Responsif untuk tablet dan perangkat besar */
    @media (min-width: 577px) {
        .card-img-top {
            height: 200px; /* Gambar akan lebih besar pada perangkat lebih besar */
        }

        .card-title {
            font-size: 1.25rem; /* Ukuran font judul lebih besar pada perangkat besar */
        }

        .card-text {
            font-size: 1rem; /* Ukuran font deskripsi lebih besar pada perangkat besar */
        }

        .btn {
            font-size: 1rem; /* Ukuran font tombol lebih besar pada perangkat besar */
            width: auto; /* Tombol kembali ke ukuran otomatis */
        }

        .d-flex {
            flex-direction: row; /* Tombol-tombol akan berbaris secara horizontal pada perangkat besar */
        }

        .mb-2 {
            margin-bottom: 10px; /* Memberikan jarak pada tombol di perangkat kecil */
        }
    }
</style>
