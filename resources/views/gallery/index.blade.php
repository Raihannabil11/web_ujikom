@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3 mb-5"> <!-- Mengurangi padding-top menjadi 3px untuk mendekatkan dengan navbar -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-5 text-center display-4">
                <i class="bi bi-images text-primary me-2"></i> 
                Daftar Gallery
            </h1>
            <p class="fs-4 text-muted mb-4 text-center">Album Gallery</p>
            <div class="row">
                @foreach($galleries as $gallery)
                    <div class="col-md-3 col-sm-6 mb-4"> <!-- Mengurangi ukuran kolom agar card lebih kecil -->
                        <div class="card hover-shadow border-0 h-100 shadow-lg"> 
                            {{-- Cek apakah galeri memiliki foto --}}
                            @if ($gallery->photos->isNotEmpty())
                                <img src="{{ $gallery->photos->first()->image_url }}" 
                                     class="card-img-top img-fluid" 
                                     alt="{{ $gallery->title }}"
                                     style="height: 150px; width: 100%; object-fit: cover;"> <!-- Menurunkan tinggi gambar -->
                            @else
                                <img src="https://via.placeholder.com/400x200" 
                                     class="card-img-top img-fluid" 
                                     alt="No Image Available"
                                     style="height: 150px; width: 100%; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column text-center">
                                <h5 class="card-title mb-2">
                                    <i class="bi bi-collection-fill text-primary me-2"></i> 
                                    {{ $gallery->title }}
                                </h5>
                                <p class="card-text small">
                                    <i class="bi bi-images me-1"></i> Jumlah Foto: {{ $gallery->photos->count() }}
                                </p>
                                <p class="card-text small">
                                    <i class="bi bi-info-circle me-1"></i> 
                                    Keterangan: {{ $gallery->description ?? 'Tidak ada keterangan' }}
                                </p>
                                <a href="{{ route('gallery.show', ['gallery' => $gallery->id]) }}" 
                                   class="btn btn-outline-primary btn-sm mt-auto align-self-start">
                                    <i class="bi bi-eye"></i> Lihat Gallery
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .hover-shadow {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .hover-shadow:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Efek hover dengan bayangan lebih kuat */
        transform: translateY(-3px); /* Efek hover naik */
    }

    .card {
        border-radius: 12px; /* Membulatkan sudut */
        overflow: hidden;
    }

    .card-img-top {
        border-radius: 12px 12px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    .shadow-lg {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Bayangan default yang lebih halus */
    }

    /* Mengurangi padding atas dan bawah untuk mendekatkan konten dengan navbar dan footer */
    .container-fluid {
        padding-top: 40px; /* Mengurangi padding-top */
        padding-bottom: 20px; /* Mengurangi padding-bottom */
    }

    /* Posisikan konten di tengah */
    .row.justify-content-center {
        display: flex;
        justify-content: center;
    }

    .col-md-10 {
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Mengatur jarak antara kolom di tampilan kecil dan besar */
    .col-md-3, .col-sm-6 {
        margin-bottom: 30px;
    }

    .display-4 {
        font-size: 2.5rem; /* Mengatur ukuran font judul */
    }

    .btn-outline-primary {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
@endsection
