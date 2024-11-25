@extends('layouts.admin')

@section('title', 'Tambah Galeri Baru')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Tambah Galeri Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.galleries.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title">Judul Galeri:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul galeri" value="{{ old('title') }}" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-plus"></i> Simpan
        </button>
        <a href="{{ route('dashboard.galleries.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Batal
        </a>
    </form>
</div>
@endsection
