@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 mb-5" style="padding-top: 30px;"> <!-- Mengurangi padding-top lebih jauh dan margin-top -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-5 text-center display-4">
                <i class="bi bi-calendar2-week text-primary me-2"></i> 
                Daftar Agenda
            </h1>
            <p class="fs-4 text-muted mb-4 text-center">Agenda Sekolah</p>
            <div class="row">
                @foreach ($agendas as $agenda)
                    <div class="col-md-6 mb-4"> <!-- Menggunakan col-md-6 agar item tidak terlalu besar -->
                        <div class="agenda-item p-4 h-100 shadow hover-shadow"> <!-- Menggunakan 'agenda-item' untuk tampilan tanpa card -->
                            <h5 class="agenda-title mb-2">
                                <i class="bi bi-bookmark-star-fill text-warning me-2"></i> 
                                {{ $agenda->title }}
                            </h5>
                            <p class="agenda-description mb-2">
                                <i class="bi bi-info-circle me-1"></i> 
                                {{ $agenda->description ?? 'Tidak ada deskripsi' }}
                            </p>
                            <p class="agenda-date">
                                <i class="bi bi-calendar3 me-1"></i> 
                                Tanggal: {{ \Carbon\Carbon::parse($agenda->event_date)->format('d M Y') }}
                            </p>
                            <div class="text-end mt-3">
                                <a href="{{ route('agendas.show', $agenda->id) }}" class="btn btn-outline-primary">
                                    <i class="bi bi-eye"></i> Lihat Detail
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
    .agenda-item {
        border-radius: 15px;
        transition: all 0.3s ease-in-out;
        background-color: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
    }

    .agenda-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
    }

    .agenda-description {
        color: #666;
        font-size: 0.9rem;
    }

    .agenda-date {
        color: #888;
        font-size: 0.9rem;
    }

    .text-end .btn-outline-primary {
        padding: 8px 15px;
        font-size: 0.9rem;
    }

    /* Menambah padding atas dan bawah di seluruh halaman untuk responsivitas */
    @media (max-width: 768px) {
        .agenda-item {
            padding: 20px;
        }
    }

    /* Menambahkan responsivitas dan jarak antar elemen yang konsisten */
    .container-fluid {
        padding-top: 30px; /* Mengurangi padding-top untuk mendekatkan ke navbar */
        padding-bottom: 50px;
    }

    .col-md-6 {
        margin-bottom: 30px;
    }

    .display-4 {
        font-size: 2.5rem; /* Ukuran font judul */
    }

    /* Menyelaraskan tombol dengan gaya yang konsisten */
    .btn-outline-primary {
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>
@endsection