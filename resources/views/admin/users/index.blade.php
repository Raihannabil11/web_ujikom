@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">
        <i class="fas fa-users"></i> Manage Users
    </h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
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
