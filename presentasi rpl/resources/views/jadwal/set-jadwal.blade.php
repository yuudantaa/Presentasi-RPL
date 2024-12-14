@extends('layouts.main')

@section('title', 'Set Jadwal Penggajian')

@section('content')
    <h5>Set Jadwal Pembayaran Gaji</h5>

    <form method="POST" action="{{ route('jadwal.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama_jadwal">Nama Jadwal:</label>
            <input type="text" class="form-control" id="nama_jadwal" name="nama_jadwal" placeholder="Masukkan Nama Jadwal" required>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal Pembayaran:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="form-group">
            <label for="periode">Periode:</label>
            <select id="periode" class="form-control" name="periode">
                <option value="bulanan">Bulanan</option>
                <option value="mingguan">Mingguan</option>
                <option value="tahunan">Tahunan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kelompok">Kelompok Karyawan:</label>
            <select id="kelompok" class="form-control" name="kelompok">
                <option value="all">Semua Karyawan</option>
                <option value="hr">HR</option>
                <option value="it">IT</option>
                <option value="marketing">Marketing</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" class="form-control" name="status">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Non-Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
    </form>

    <h5 class="mt-5">Daftar Jadwal</h5>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nama Jadwal</th>
                <th>Tanggal</th>
                <th>Periode</th>
                <th>Kelompok Karyawan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->id }}</td>
                    <td>{{ $jadwal->nama_jadwal }}</td>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ ucfirst($jadwal->periode) }}</td>
                    <td>{{ ucfirst($jadwal->kelompok) }}</td>
                    <td>{{ ucfirst($jadwal->status) }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
