@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Info</h1>
    <form action="{{ route('dashboard.infos.update', $info->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $info->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="6" required>{{ old('content', $info->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update Info
        </button>
        <a href="{{ route('dashboard.infos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </form>
</div>
@endsection
