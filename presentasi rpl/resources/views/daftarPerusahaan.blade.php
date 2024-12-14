@extends('layouts.main')

@section('title', 'Daftar Perusahaan')

@section('content')
<div class="container mt-4">
    <h1 class="text-center fw-bold mb-4" style="color: #003f73;">Daftar Perusahaan</h1>

    <!-- Menampilkan pesan sukses setelah tindakan berhasil -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol untuk menambah perusahaan -->
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('perusahaan.create') }}" class="btn btn-primary btn-sm" style="border-radius: 15px;">
        <i class="bi bi-plus-circle"></i> Tambah Perusahaan
    </a>
</div>

    <!-- Tabel Daftar Perusahaan -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Nama Bank</th>
                    <th>Rekening</th>
                    <th>Jumlah Karyawan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($perusahaans as $perusahaan)
                <tr>
                    <td class="fw-bold">{{ $perusahaan->nama_perusahaan }}</td>
                    <td>{{ $perusahaan->nama_bank }}</td>
                    <td>{{ $perusahaan->rekening }}</td>
                    <td>
                        <span class="badge bg-info text-white">{{ $perusahaan->karyawans_count }}</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- Tombol Edit -->
                            <button onclick="location.href='{{ route('perusahaan.edit', $perusahaan->id) }}'"
                                    class="btn btn-sm btn-warning me-2" style="border-radius: 20px;">
                                <i class="bi bi-pencil"></i> Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('perusahaan.destroy', $perusahaan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 20px;"
                                        onclick="return confirm('Hapus perusahaan?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-muted">Belum ada data perusahaan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Custom CSS -->
<style>
    table {
        font-size: 0.9rem;
    }

    .table thead th {
        font-weight: bold;
        color: #003f73;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.5em 0.7em;
    }

    .btn {
        transition: all 0.3s ease-in-out;
    }

    .btn:hover {
        transform: scale(1.05);
    }
</style>
@endsection
