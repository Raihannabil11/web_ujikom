@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Gallery</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.galleries.update', $gallery->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $gallery->title }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update Gallery
        </button>
        <a href="{{ route('dashboard.galleries.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Cancel
        </a>
    </form>
</div>
@endsection
