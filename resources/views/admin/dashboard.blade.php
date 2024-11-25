@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>
    <p class="text-center mb-5">Welcome to your dashboard, admin!</p>

    <div class="row">
        <!-- Kartu Statistik -->
        <div class="col-md-3 mb-4">
            <div class="card hover-shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Users</h5>
                    <h2 class="display-4 text-primary">{{ $totalUsers }}</h2>
                    <p class="card-text">Users registered in the system.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card hover-shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Galleries</h5>
                    <h2 class="display-4 text-success">{{ $totalGalleries }}</h2>
                    <p class="card-text">Total galleries created.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card hover-shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Info</h5>
                    <h2 class="display-4 text-warning">{{ $totalInfos }}</h2>
                    <p class="card-text">Total information available.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card hover-shadow border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Agendas</h5>
                    <h2 class="display-4 text-danger">{{ $totalAgendas }}</h2>
                    <p class="card-text">Total agendas scheduled.</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-5">
        <i class="fas fa-history"></i> Recent Activities <!-- Ikon ditambahkan di sini -->
    </h2>
    @if($recentActivities->isEmpty())
        <p>No recent activities found.</p>
    @else
        <ul class="list-group">
            @foreach($recentActivities as $activity)
                <li class="list-group-item">
                    <i class="fas fa-clipboard-check"></i> <!-- Contoh ikon untuk aktivitas -->
                    {{ $activity->description }} - <small>{{ $activity->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>

<style>
.hover-shadow {
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
}
</style>
@endsection
