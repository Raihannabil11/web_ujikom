@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">
        <i class="fas fa-user-edit"></i> Edit User
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" 
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-check"></i> Update User
        </button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Cancel
        </a>
    </form>
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

    .alert {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .alert-danger {
        background-color: #f8d7da; /* Light red background */
        border-color: #f5c6cb; /* Light red border */
    }
</style>
@endsection
