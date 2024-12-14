@extends("layouts.main")

@section("title", "Dashboard")

@section('content')
<div class="container mt-5">
    <!-- Page Title -->
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h1 class="fw-bold" style="color: #0056b3;">Dashboard</h1>
            <p class="text-muted">
                Selamat datang,
                @if(Auth::check())
                    <strong>{{ Auth::user()->name }}</strong>! Berikut adalah ringkasan aktivitas dan informasi penting.
                @else
                    <strong>Tamu</strong>! Silakan login untuk melihat informasi lebih lanjut.
                @endif
            </p>
        </div>
    </div>

    @if(Auth::check())
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <p>Anda login sebagai: <strong>{{ Auth::user()->name }}</strong></p>
                <p>Role Anda adalah: <strong>{{ Auth::user()->role }}</strong></p>
            </div>
        </div>

        <!-- Stats Row -->
        <div class="row g-4 justify-content-center">
            <!-- Total Karyawan Card -->
            <div class="col-md-4">
                <div class="card border-0 shadow-lg position-relative" style="background: linear-gradient(to right, #007BFF, #00BFFF); color: white; border-radius: 15px;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Total Karyawan</h5>
                            <h3 class="fw-bold">{{ $totalKaryawan ?? '10' }}</h3>
                        </div>
                    </div>
                    <small class="position-absolute end-0 bottom-0 m-3 text-white-50">Last updated: {{ now()->format('d M Y') }}</small>
                </div>
            </div>

            <!-- Total Perusahaan Card -->
            <div class="col-md-4">
                <div class="card border-0 shadow-lg position-relative" style="background: linear-gradient(to right, #FF7E5F, #FD5D93); color: white; border-radius: 15px;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-building fa-3x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Total Perusahaan</h5>
                            <h3 class="fw-bold">{{ $totalPerusahaan ?? '1' }}</h3>
                        </div>
                    </div>
                    <small class="position-absolute end-0 bottom-0 m-3 text-white-50">Last updated: {{ now()->format('d M Y') }}</small>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                    <div class="card-header text-white fw-bold text-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px; background: linear-gradient(90deg, #007BFF, #0056b3);">
                        Aktivitas Terbaru
                    </div>
                    <div class="card-body bg-light">
                        <ul class="list-group list-group-flush">
                            @forelse($recentActivities ?? [] as $activity)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $activity->description }}</span>
                                    <span class="badge bg-primary">{{ $activity->created_at->diffForHumans() }}</span>
                                </li>
                            @empty
                                <li class="list-group-item text-center text-muted">Belum ada aktivitas terbaru.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p class="text-danger">Anda belum login. Silakan <a href="/login" class="text-primary">login</a> untuk melihat data.</p>
            </div>
        </div>
    @endif
</div>
@endsection
