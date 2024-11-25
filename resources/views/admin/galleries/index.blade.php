@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">
        <i class="fas fa-images"></i> Manage Galleries
    </h1>

    <a href="{{ route('dashboard.galleries.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Galeri
    </a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Owner</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($galleries as $gallery)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gallery->title }}</td>
                    <td>
                        @if ($gallery->user)
                            {{ $gallery->user->name }}
                        @else
                            <em>No Owner</em>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('dashboard.galleries.show', $gallery->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('dashboard.galleries.edit', $gallery->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.galleries.destroy', $gallery->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this gallery?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .btn {
        transition: background-color 0.3s ease, color 0.3s ease;
        font-size: 0.9rem; /* Adjust font size */
    }

    .btn:hover {
        background-color: #0056b3; /* Change to your preferred hover color */
        color: white; /* Change text color on hover */
    }

    .table tr:hover {
        background-color: #f1f1f1; /* Change to your preferred row hover color */
    }

    .alert {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .alert-success {
        background-color: #d4edda; /* Light green background */
        border-color: #c3e6cb; /* Light green border */
    }

    .alert-danger {
        background-color: #f8d7da; /* Light red background */
        border-color: #f5c6cb; /* Light red border */
    }

    /* Responsif untuk ukuran kecil (mobile) */
    @media (max-width: 576px) {
        .table th, .table td {
            font-size: 0.8rem; /* Mengurangi ukuran font pada perangkat kecil */
        }

        .btn {
            font-size: 0.8rem; /* Menyesuaikan ukuran font tombol */
            width: 100%; /* Tombol akan mengambil lebar penuh pada perangkat kecil */
            margin-bottom: 10px; /* Menambahkan margin antara tombol */
        }

        .table-responsive {
            overflow-x: auto; /* Menambahkan scroll horizontal untuk tabel pada perangkat kecil */
        }
    }

    /* Responsif untuk tablet dan desktop */
    @media (min-width: 577px) {
        .btn {
            width: auto; /* Tombol akan memiliki ukuran otomatis */
        }
    }

    /* Untuk memastikan kontainer tidak menyentuh pinggir pada perangkat besar */
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
@endsection
