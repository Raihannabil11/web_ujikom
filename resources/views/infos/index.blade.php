@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 mb-5" style="padding-top: 30px;"> <!-- Mengurangi padding-top lebih jauh dan margin-top -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-5 text-center display-4">
                <i class="bi bi-info-circle-fill text-primary me-2"></i> 
                Daftar Informasi
            </h1>
            <p class="fs-4 text-muted mb-4 text-center">Informasi Terbaru</p>
            <div class="row">
                @foreach ($infos as $info)
                    <div class="col-md-6 mb-4"> <!-- Menyesuaikan ukuran kolom agar informasi tidak terlalu besar -->
                        <div class="info-item p-4 h-100 shadow hover-shadow"> <!-- Menggunakan 'info-item' untuk tampilan tanpa card -->
                            <img src="https://via.placeholder.com/300x150" class="info-img w-100 mb-3" alt="{{ $info->title }}">
                            <h5 class="info-title mb-2">
                                {{ $info->title }}
                            </h5>
                            <p class="info-content">{{ Str::limit($info->content, 80) }}</p> <!-- Mengurangi jumlah karakter untuk ringkasan -->
                            <a href="{{ route('infos.show', $info->id) }}" class="btn btn-outline-primary mt-2 d-inline-flex align-items-center">
                                <i class="bi bi-box-arrow-right me-2"></i> Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .info-item {
        border-radius: 15px;
        transition: all 0.3s ease-in-out;
        background-color: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
    }

    .info-img {
        height: 150px; /* Ukuran gambar lebih kecil */
        object-fit: cover;
        border-radius: 10px;
    }

    .info-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
    }

    .info-content {
        color: #666;
        font-size: 0.85rem; /* Ukuran teks lebih kecil */
    }

    /* Responsivitas pada perangkat kecil */
    @media (max-width: 768px) {
        .info-img {
            height: 120px; /* Menyesuaikan tinggi gambar untuk layar kecil */
        }
        .info-item {
            padding: 20px; /* Mengurangi padding pada perangkat kecil */
        }
    }

    /* Mengatur padding-top dan padding-bottom untuk jarak yang lebih baik */
    .container-fluid {
        padding-top: 30px; /* Mengurangi padding-top lebih jauh */
        padding-bottom: 50px;
    }

    .col-md-6 {
        margin-bottom: 30px;
    }

    .display-4 {
        font-size: 2.5rem; /* Mengatur ukuran font judul */
    }

    /* Menyelarakan tombol dengan gaya yang konsisten */
    .btn-outline-primary {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
@endsection
