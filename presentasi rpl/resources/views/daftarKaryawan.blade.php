@extends("layouts.main")

@section("title", "Daftar Karyawan")

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-primary">Daftar Karyawan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah -->
    <div class="mb-3 text-end">
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary shadow-sm" style="border-radius: 20px;">
            <i class="bi bi-person-plus"></i> Tambah Karyawan
        </a>
    </div>


    <!-- Tabel Karyawan -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="thead-dark">
                <tr class="bg-primary text-white">
                    <th>Nama</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Status</th>
                    <th>Department</th>
                    <th>Joining Date</th>
                    <th>Perusahaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($karyawans as $karyawan)
                    <tr>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->nama_bank }}</td>
                        <td>{{ $karyawan->no_rekening }}</td>
                        <td>
                            <span class="badge {{ $karyawan->status == 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                {{ $karyawan->status }}
                            </span>
                        </td>
                        <td>{{ $karyawan->department }}</td>
                        <td>{{ \Carbon\Carbon::parse($karyawan->joining_date)->format('d M Y') }}</td>
                        <td class="text-start">
                            @if($karyawan->perusahaan)
                                <span class="badge bg-info text-white">
                                    {{ $karyawan->perusahaan->nama_perusahaan }}
                                </span>
                            @else
                                <span class="badge bg-secondary text-white">
                                    Belum ada perusahaan
                                </span>
                            @endif
                        </td>
                        <td>
                            <!-- Tombol Edit -->
                            <button onclick="location.href='{{ route('karyawan.edit', $karyawan->id) }}'"
                                    class="btn btn-warning btn-sm"
                                    style="border-radius: 50px; padding: 5px 15px; font-weight: bold;">
                                Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        style="border-radius: 50px; padding: 5px 15px; font-weight: bold;"
                                        onclick="return confirm('Yakin ingin menghapus karyawan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-muted">Belum ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        padding: 8px 12px;
        font-size: 0.85rem;
        border-radius: 10px;
    }
    .btn {
        font-size: 0.9rem;
    }
    .btn i {
        margin-right: 5px;
    }
</style>
@endsection
