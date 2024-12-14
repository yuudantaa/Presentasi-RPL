@extends('layouts.main')

@section('title', 'Tambah Perusahaan')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg" style="border-radius: 15px; background-color: #ffffff;">
        <div class="card-header bg-primary text-white" style="border-radius: 15px 15px 0 0;">
            <h3 class="mb-0">Tambah Perusahaan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('perusahaan.store') }}" method="POST">
                @csrf
                <!-- Input Nama Perusahaan -->
                <div class="form-group mb-4">
                    <label for="nama_perusahaan" class="form-label fw-bold">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Masukkan nama perusahaan" value="{{ old('nama_perusahaan') }}" required>
                </div>

                <!-- Input Nama Bank -->
                <div class="form-group mb-4">
                    <label for="nama_bank" class="form-label fw-bold">Nama Bank</label>
                    <select name="nama_bank" id="nama_bank" class="form-control" required>
                        <option value="">-- Pilih Bank --</option>
                        <option value="BCA" {{ old('nama_bank') == 'BCA' ? 'selected' : '' }}>BCA</option>
                        <option value="Mandiri" {{ old('nama_bank') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                        <option value="BNI" {{ old('nama_bank') == 'BNI' ? 'selected' : '' }}>BNI</option>
                        <option value="BRI" {{ old('nama_bank') == 'BRI' ? 'selected' : '' }}>BRI</option>
                    </select>
                </div>

                <!-- Input No. Rekening -->
                <div class="form-group mb-4">
                    <label for="rekening" class="form-label fw-bold">No. Rekening</label>
                    <input type="text" name="rekening" id="rekening" class="form-control" placeholder="Masukkan nomor rekening" value="{{ old('rekening') }}" required>
                </div>

                <!-- Tombol Simpan dan Batal -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" style="border-radius: 50px; padding: 10px 20px; font-weight: bold;">Simpan</button>
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary" style="border-radius: 50px; padding: 10px 20px; font-weight: bold;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
