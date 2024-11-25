@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">
        <i class="fas fa-calendar-alt"></i> Manage Agendas
    </h1>

    <a href="{{ route('dashboard.agendas.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Agenda
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
                    <th>Description</th>
                    <th>Event Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $agenda)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $agenda->title }}</td>
                    <td>{{ Str::limit($agenda->description, 50) }}</td>
                    <td>{{ $agenda->event_date->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('dashboard.agendas.show', $agenda->id) }}" class="btn btn-info btn-sm mb-1 mb-md-0">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('dashboard.agendas.edit', $agenda->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('dashboard.agendas.destroy', $agenda->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this agenda?');">
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

    /* Responsif untuk perangkat kecil */
    @media (max-width: 576px) {
        .btn {
            font-size: 0.8rem; /* Menyesuaikan ukuran tombol untuk perangkat kecil */
            width: 100%; /* Tombol akan mengambil lebar penuh pada perangkat kecil */
            margin-top: 5px; /* Memberikan jarak antar tombol */
        }

        .table th, .table td {
            padding: 0.75rem; /* Menyesuaikan padding agar lebih rapat */
        }

        .table {
            font-size: 0.9rem; /* Menyesuaikan ukuran font tabel */
        }
    }

    /* Responsif untuk perangkat dengan layar lebih besar */
    @media (min-width: 577px) {
        .btn {
            font-size: 1rem; /* Ukuran font tombol kembali lebih besar pada perangkat besar */
            width: auto; /* Tombol kembali ke ukuran otomatis */
        }
    }
</style>
@endsection
