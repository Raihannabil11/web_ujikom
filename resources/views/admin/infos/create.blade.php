@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Create New Info</h1>
    <form method="POST" action="{{ route('dashboard.infos.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">Description:</label>
            <textarea class="form-control" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Submit
        </button>
        <a href="{{ route('dashboard.infos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Cancel
        </a>
    </form>
</div>
@endsection
