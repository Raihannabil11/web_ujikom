@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Judul Foto -->
    <h1 class="text-center mb-4 animate__animated animate__fadeInDown">
        <i class="bi bi-images"></i> {{ $photo->title }}
    </h1>

    <!-- Gambar Foto -->
    <div class="text-center mb-4">
        <img src="{{ $photo->image_url }}" 
             class="img-fluid rounded shadow-lg animate__animated animate__zoomIn" 
             alt="{{ $photo->title }}" 
             style="max-height: 400px; object-fit: cover;">
    </div>

    <!-- Deskripsi Foto -->
    <div class="text-center mb-4">
        <p class="lead text-muted" style="font-size: 1.125rem;">
            <i class="bi bi-file-earmark-text"></i> {{ $photo->description }}
        </p>
    </div>

    <hr>

    <!-- Bagian Komentar -->
    <h3 class="mt-4 mb-3">
        <i class="bi bi-chat-left-text"></i> Komentar
    </h3>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- List Komentar -->
    @forelse ($photo->comments as $comment)
        <div class="card mb-4 shadow-sm animate__animated animate__fadeInUp">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $comment->user->name }}</strong>
                        <span class="text-muted d-block">{{ $comment->created_at->format('d M Y') }}</span>
                    </div>
                    @if (Auth::id() === $comment->user_id)
                        <div>
                            <!-- Tombol Edit -->
                            <button class="btn btn-outline-primary btn-sm edit-button" 
                                    data-comment-id="{{ $comment->id }}" 
                                    data-comment-content="{{ $comment->content }}">
                                <i class="bi bi-pencil"></i> Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <button class="btn btn-outline-danger btn-sm delete-button" 
                                    data-comment-id="{{ $comment->id }}">
                                <i class="bi bi-trash"></i> Hapus
                            </button>

                            <form id="delete-comment-{{ $comment->id }}" 
                                  action="{{ route('comments.destroy', $comment->id) }}" 
                                  method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    @endif
                </div>
                <p class="mt-3" style="font-size: 1rem;">{{ $comment->content }}</p>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">Belum ada komentar.</p>
    @endforelse

    <!-- Form Tambah Komentar -->
    @auth
        <div class="mt-5">
            <h4 class="mb-3"><i class="bi bi-plus-circle"></i> Tambah Komentar</h4>
            <form action="{{ route('photos.comment.store', $photo->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Komentar</label>
                    <textarea name="content" id="content" rows="3" 
                              class="form-control rounded-3 shadow-sm" required style="font-size: 1rem;"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-success w-100 rounded-pill">
                    <i class="bi bi-paperplane"></i> Kirim Komentar
                </button>
            </form>
        </div>
    @else
        <p class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none">Login</a> untuk menambahkan komentar.
        </p>
    @endauth
</div>

<!-- Modal Edit Komentar -->
<div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCommentForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCommentModalLabel"><i class="bi bi-pencil"></i> Edit Komentar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-content" class="form-label">Komentar</label>
                        <textarea name="content" id="edit-content" rows="3" 
                                  class="form-control rounded-3 shadow-sm" required style="font-size: 1rem;"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script JavaScript -->
<script>
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function () {
            const commentId = this.getAttribute('data-comment-id');
            const commentContent = this.getAttribute('data-comment-content');

            // Isi textarea dengan konten komentar
            document.getElementById('edit-content').value = commentContent;

            // Set action form untuk update komentar
            document.getElementById('editCommentForm').action = `/comments/${commentId}`;

            // Tampilkan modal
            new bootstrap.Modal(document.getElementById('editCommentModal')).show();
        });
    });

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const commentId = this.getAttribute('data-comment-id');
            if (confirm('Yakin ingin menghapus komentar ini?')) {
                document.getElementById(`delete-comment-${commentId}`).submit();
            }
        });
    });
</script>

@endsection
