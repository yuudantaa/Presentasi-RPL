@extends('layouts.main')

@section('title', 'Sumber Dana')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-primary">Manajemen Sumber Dana</h1>

    <!-- Dropdown Pilih Bank -->
    <div class="form-group col-md-4 mb-4">
        <label for="bank" class="form-label fw-bold">Pilih Bank:</label>
        <select id="bank" class="form-control">
            <option value="">-- Pilih Bank --</option>
            <option value="bca">BCA</option>
            <option value="mandiri">Mandiri</option>
            <option value="bni">BNI</option>
        </select>
    </div>

    <!-- Tabel Nama Perusahaan -->
    <h5 class="text-primary">Daftar Perusahaan</h5>
    <table class="table table-bordered table-striped table-hover mt-3">
        <thead class="bg-primary text-white">
            <tr>
                <th>Nama Bank</th>
                <th>Nama Perusahaan</th>
                <th>Nomor Rekening</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perusahaans as $perusahaan)
                <tr>
                    <td>{{ $perusahaan->nama_bank }}</td>
                    <td>{{ $perusahaan->nama_perusahaan }}</td>
                    <td>{{ $perusahaan->rekening }}</td>
                    <td>
                        <button
                            class="btn btn-info btn-sm text-white me-2"
                            onclick="alert('Fitur ini masih dalam pengembangan')"
                            style="border-radius: 10px;">
                            Detail
                        </button>
                        <button
                            class="btn btn-danger btn-sm text-white"
                            onclick="confirm('Yakin ingin menghapus data ini?')"
                            style="border-radius: 10px;">
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Custom CSS -->
<style>
    .btn-info:hover {
        background-color: #0056b3;
    }

    .btn-danger:hover {
        background-color: #d9534f;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f5f9;
    }
</style>
@endsection
