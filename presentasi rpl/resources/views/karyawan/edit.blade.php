@extends('layouts.main')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4" style="color: #003f73; font-weight: bold;">Edit Karyawan</h1>

    <!-- Form Edit Karyawan -->
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" class="p-4 border shadow-sm rounded" style="background: #f9f9f9;">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="form-group">
            <label for="nama" class="fw-bold">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $karyawan->nama) }}" placeholder="Masukkan nama karyawan" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- No Rekening -->
        <div class="form-group">
            <label for="no_rekening" class="fw-bold">No Rekening</label>
            <input type="text" id="no_rekening" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror" value="{{ old('no_rekening', $karyawan->no_rekening) }}" placeholder="Masukkan nomor rekening" required>
            @error('no_rekening')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status" class="fw-bold">Status</label>
            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="">--Pilih Status--</option>
                <option value="Aktif" {{ old('status', $karyawan->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Non-Aktif" {{ old('status', $karyawan->status) == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Department -->
        <div class="form-group">
            <label for="department" class="fw-bold">Department</label>
            <select id="department" name="department" class="form-control @error('department') is-invalid @enderror" required>
                <option value="">--Pilih Department--</option>
                <option value="HRD" {{ old('department', $karyawan->department) == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="Finance" {{ old('department', $karyawan->department) == 'Finance' ? 'selected' : '' }}>Finance</option>
                <option value="IT" {{ old('department', $karyawan->department) == 'IT' ? 'selected' : '' }}>IT</option>
                <option value="Marketing" {{ old('department', $karyawan->department) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                <option value="Sales" {{ old('department', $karyawan->department) == 'Sales' ? 'selected' : '' }}>Sales</option>
            </select>
            @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Joining Date -->
        <div class="form-group">
            <label for="joining_date" class="fw-bold">Tanggal Bergabung</label>
            <input type="date" id="joining_date" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror" value="{{ old('joining_date', $karyawan->joining_date) }}" required>
            @error('joining_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Bank -->
        <div class="form-group">
            <label for="nama_bank" class="fw-bold">Nama Bank</label>
            <select id="nama_bank" name="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror" required>
                <option value="">--Pilih Bank--</option>
                <option value="BCA" {{ old('nama_bank', $karyawan->nama_bank) == 'BCA' ? 'selected' : '' }}>BCA</option>
                <option value="Mandiri" {{ old('nama_bank', $karyawan->nama_bank) == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                <option value="BNI" {{ old('nama_bank', $karyawan->nama_bank) == 'BNI' ? 'selected' : '' }}>BNI</option>
                <option value="BRI" {{ old('nama_bank', $karyawan->nama_bank) == 'BRI' ? 'selected' : '' }}>BRI</option>
            </select>
            @error('nama_bank')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Perusahaan -->
        <div class="form-group">
            <label for="perusahaan_id" class="fw-bold">Nama Perusahaan</label>
            <select id="perusahaan_id" name="perusahaan_id" class="form-control @error('perusahaan_id') is-invalid @enderror" required>
                <option value="">--Pilih Perusahaan--</option>
                @foreach($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id', $karyawan->perusahaan_id) == $perusahaan->id ? 'selected' : '' }}>
                        {{ $perusahaan->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
            @error('perusahaan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol -->
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success px-4">Simpan</button>
            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
