<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gallery Web</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <style>
        /* Ensure the html and body take full height */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Flex container to push footer to bottom */
        body {
            display: flex;
            flex-direction: column;
            font-family: 'Open Sans', sans-serif;
            background-color: #FFFFFF;
            color: #1a1a1a;
            transition: background-color 0.3s, color 0.3s;
            font-size: 1.1rem; /* Menurunkan ukuran font */
        }

        /* Navbar styling */
        .navbar-custom {
            background-color: #1c1f24;
            padding: 1.7rem 2rem; /* Menurunkan padding navbar */
            font-size: 1.5rem; /* Ukuran font navbar sedikit lebih kecil */
        }

        .navbar-brand img {
            height: 50px; /* Mengurangi ukuran gambar logo */
            margin-right: 15px;
        }

        .navbar-custom .nav-link {
            color: #ffffff !important;
            position: relative;
            padding: 0.75rem 1rem; /* Menurunkan padding */
            font-size: 0.95rem; /* Ukuran font nav-link lebih kecil */
            transition: color 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .navbar-custom .nav-link:hover {
            color: #f8f9fa;
            text-decoration: none;
            transform: scale(1.05);
        }

        /* Active link styling */
        .navbar-custom .nav-link.active {
            font-weight: 500;
            color: #ffc107 !important; /* Highlight active link with a distinct color */
        }

        /* Main content area should take up available space */
        .content-wrap {
            flex: 1 0 auto;
            padding-top: 70px; /* Memberi jarak cukup dari navbar */
        }

        /* Footer styling */
        footer {
            background-color: #1c1f24;
            color: #ffffff;
            text-align: center;
            padding: 1rem 1rem; /* Menurunkan padding footer */
            flex-shrink: 0;
        }

        footer p {
            margin: 0;
            font-size: 0.85rem; /* Ukuran font footer lebih kecil */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar-custom {
                padding: 1rem 1.5rem;
            }

            .navbar-custom .nav-link {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem; /* Ukuran font lebih kecil di perangkat kecil */
            }

            footer {
                padding: 1rem 0.5rem;
            }

            footer p {
                font-size: 0.75rem; /* Ukuran font footer lebih kecil di perangkat kecil */
            }
        }

        /* Hover effects for dropdown items */
        .dropdown-menu a.dropdown-item:hover {
            background-color: #343a40;
            color: #ffc107;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="color: #ffffff;">
                <img src="https://png.pngtree.com/png-vector/20211011/ourmid/pngtree-school-logo-png-image_3977360.png" alt="School Logo">
                <span>Gallery Web</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Centered navigation menu -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">
                            <i class="bi bi-image"></i> Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('info.index') ? 'active' : '' }}" href="{{ route('info.index') }}">
                            <i class="bi bi-info-circle"></i> Informasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}" href="{{ route('agenda.index') }}">
                            <i class="bi bi-calendar-event"></i> Agenda
                        </a>
                    </li>

                    @auth
                    @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    @endif
                    @endauth
                </ul>

                <!-- User login/logout menu -->
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                    @csrf
                                    <button class="btn btn-link text-decoration-none w-100 text-start">
                                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrap container mt-5 pt-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 SMKN 4 Bogor. All Rights Reserved.</p>
            <!-- Optional: Add social media links or additional information -->
            <div class="mt-2">
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    <!-- Optional: Add additional scripts here -->
</body>

</html>
