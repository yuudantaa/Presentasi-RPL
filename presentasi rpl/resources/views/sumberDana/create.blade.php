@extends('layouts.main')

@section('title', 'Tambah Sumber Dana')

@section('content')
<div class="container">
    <h1>Tambah Sumber Dana</h1>
    <form action="{{ route('sumberDana.store') }}" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Nama Bank</th>
                        <th>Gaji</th>
                        <th>Nomor Rekening</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_bank" name="nama_bank" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" id="gaji" name="gaji" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" required>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <select class="form-control" id="status" name="status" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="non-aktif">Non-Aktif</option>
                                </select>
                            </div>
                        </td>
                        <td class="text-center">
                            <button type="submit" class="btn btn-primary">Pilih</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection
