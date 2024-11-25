@extends('layouts.app')

@section('content')
<div class="container my-3" style="padding-top: 40px;">
    <h1 class="text-center mb-4"><p class="fs-4 text-muted mb-4">Selamat Datang di Website Kami!</p>
    <p class="text-center mb-5">{{ $welcomeMessage }}</p>

    <!-- Slideshow Section -->
    <div id="photoCarousel" class="carousel slide mb-4 rounded" data-bs-ride="carousel">
        <div class="carousel-inner shadow-lg"> <!-- Menambahkan kelas shadow-lg di sini -->
            <div class="carousel-item active">
                <img src="https://t-2.tstatic.net/bogor/foto/bank/images/smkn-4-kota-bogor-mobil-listrik_20160426_180755.jpg" class="d-block w-100 rounded slideshow-img" alt="Slideshow Image 1">
            </div>
            <div class="carousel-item">
                <img src="https://inilahonline.com/wp-content/uploads/2023/10/SMKN-4-Bogor-2-690x400.jpg" class="d-block w-100 rounded slideshow-img" alt="Slideshow Image 2">
            </div>
            <div class="carousel-item">
                <img src="https://lh5.googleusercontent.com/viO81VtxbwzqFFEa0G7q7o-ZNJAZ2s0H0-4Ou5ZgvGHdfe80cyw0rgQTe2WUdmxT=s1134-k-no" class="d-block w-100 rounded slideshow-img" alt="Slideshow Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!-- Google Maps Section -->
<div class="container-fluid p-0 mb-4" style="margin-top: 113px;">
    <h1 class="text-center mb-4"><i class="fas fa-map-marker-alt"></i>School Location</h1>
    <p class="fs-4 text-muted mb-4 text-center">Lokasi Sekolah Kami!</p>
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31612.37980204257!2d106.7599682971201!3d-6.554570917603698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMKN%204%20Bogor!5e0!3m2!1sen!2sid!4v1731286987917!5m2!1sen!2sid" 
        width="100%" 
        height="450" 
        style="border:0; border-radius: 10px; overflow: hidden;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

<!-- Login Prompt for more info -->
<div class="text-center mb-5" style="margin-top: 50px;">
    <p class="fs-4 text-muted mb-4">To access more details about our school and exclusive content, please log in.</p>
    
    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 py-3 shadow-lg rounded-pill transition-all hover:scale-105 hover:shadow-xl">
            <i class="fas fa-user-circle me-2"></i> Login
        </a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg px-5 py-3 shadow-lg rounded-pill transition-all hover:scale-105 hover:shadow-xl">
            <i class="fas fa-pen me-2"></i> Register
        </a>
    </div>
</div>

<!-- Custom Styles -->
<style>
    /* Slideshow image styling */
    .slideshow-img {
        height: 600px; /* Ukuran gambar diperbesar */
        object-fit: cover;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); /* Shadow lebih intens pada gambar */
    }

    .mb-5 {
        margin-bottom: 50px;
    }

    /* Responsive design for different screen sizes */
    @media (max-width: 576px) {
        iframe {
            height: 300px;
        }
        .slideshow-img {
            height: 350px; /* Ukuran gambar lebih besar pada layar kecil */
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {
        iframe {
            height: 400px;
        }
        .slideshow-img {
            height: 400px; /* Ukuran gambar lebih besar pada layar sedang */
        }
    }

    @media (min-width: 768px) {
        iframe {
            height: 450px;
        }
        .slideshow-img {
            height: 450px; /* Ukuran gambar lebih besar pada layar besar */
        }
    }

    /* Transition and hover effects */
    .transition-all {
        transition: all 0.3s ease;
    }

    .hover\:scale-105:hover {
        transform: scale(1.05);
    }

    .hover\:shadow-xl:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Button styles */
    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }
</style>
@endsection
