<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap Bundle with Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            overflow-y: auto;
            border-right: 1px solid #dee2e6;
        }

        .nav-link {
            transition: transform 0.3s;
            font-size: 1.1rem;
            padding: 15px;
        }

        .nav-link:hover {
            transform: scale(1.05);
        }

        .nav-link.active {
            background-color: #004085;
            color: white;
            border-radius: 5px;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .sidebar-heading {
            font-weight: bold;
        }

        .btn-link {
            text-decoration: none;
            color: white;
        }

        .btn-link:hover {
            color: white;
        }

        h2 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        /* Sidebar styles for mobile */
        @media (max-width: 767px) {
            .sidebar {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1050;
                width: 250px;
                background-color: #343a40;
                height: 100vh;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .navbar-toggler {
                border-color: #fff;
            }

            .navbar-collapse {
                justify-content: flex-end;
            }
        }

        /* Desktop sidebar */
        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
            }

            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.galleries.*') ? 'active' : '' }}"
                            href="{{ route('dashboard.galleries.index') }}">
                            <i class="fas fa-images"></i> Manage Galleries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.infos.index') ? 'active' : '' }}"
                            href="{{ route('dashboard.infos.index') }}">
                            <i class="fas fa-info-circle"></i> Manage Info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.agendas.index') ? 'active' : '' }}"
                            href="{{ route('dashboard.agendas.index') }}">
                            <i class="fas fa-calendar-alt"></i> Manage Agendas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
                            <i class="fas fa-users"></i> Manage Users
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Menu</span>
                    </h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                                href="{{ route('dashboard.index') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                                href="{{ route('users.index') }}">
                                <i class="fas fa-users"></i> Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.galleries.*') ? 'active' : '' }}"
                                href="{{ route('dashboard.galleries.index') }}">
                                <i class="fas fa-images"></i> Manage Galleries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.infos.index') ? 'active' : '' }}"
                                href="{{ route('dashboard.infos.index') }}">
                                <i class="fas fa-info-circle"></i> Manage Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.agendas.index') ? 'active' : '' }}"
                                href="{{ route('dashboard.agendas.index') }}">
                                <i class="fas fa-calendar-alt"></i> Manage Agendas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile devices
        const sidebar = document.querySelector('.sidebar');
        const sidebarToggle = document.querySelector('.navbar-toggler');
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>
