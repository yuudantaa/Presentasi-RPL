<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Perusahaan;
use App\SumberDana;
use App\Jadwal;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Halaman Utama (Home)
    public function home()
{
    return view('home');
}

    // Daftar Karyawan
    public function daftarKaryawan()
    {
        $karyawans = Karyawan::with('perusahaan')->get();
        return view('daftarKaryawan', compact('karyawans'));
    }

    // Daftar Perusahaan
    public function daftarPerusahaan()
    {
        $perusahaans = Perusahaan::withCount('karyawans')->get(); // Hitung jumlah karyawan
        return view("daftarPerusahaan", compact('perusahaans'));
    }

    // Form Menambah Karyawan
    public function createKaryawan()
    {
        $perusahaans = Perusahaan::all();
        return view('karyawan.create', compact('perusahaans'));
    }

    // Menyimpan Data Karyawan
    public function storeKaryawan(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_rekening' => 'required|numeric',
            'status' => 'required|string',
            'department' => 'required|string',
            'joining_date' => 'required|date',
            'nama_bank' => 'required|string',
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);

        Karyawan::create($validatedData);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Edit Karyawan
    public function editKaryawan(Karyawan $karyawan)
    {
        $perusahaans = Perusahaan::all();
        return view('karyawan.edit', compact('karyawan', 'perusahaans'));
    }

    // Update Data Karyawan
    public function updateKaryawan(Request $request, Karyawan $karyawan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'no_rekening' => 'required|string',
            'status' => 'required|string',
            'department' => 'required|string',
            'joining_date' => 'required|date',
            'nama_bank' => 'required|string',
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);

        $karyawan->update($validatedData);

         // Log aktivitas
    //     Log::create([
    //     'action' => 'CREATE',
    //     'description' => "Menambahkan karyawan baru: {$request->nama}",
    //     'entity' => 'Karyawan',
    //     'user_id' => auth()->id(),
    // ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    // Menghapus Data Karyawan
    public function destroyKaryawan(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }

    // Menambah Perusahaan
    public function createPerusahaan()
    {
        return view('perusahaan.createperusahaan');
    }

    // Menyimpan Data Perusahaan
    public function storePerusahaan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_bank' => 'required|string|max:255',
            'rekening' => 'required|string|max:20',
        ]);

        Perusahaan::create($validatedData);

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    // Edit Perusahaan
    public function editPerusahaan(Perusahaan $perusahaan)
    {
        return view('perusahaan.editperusahaan', compact('perusahaan'));
    }

    // Update Data Perusahaan
    public function updatePerusahaan(Request $request, Perusahaan $perusahaan)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_bank' => 'required|string|max:255',
            'rekening' => 'required|string|max:20',
        ]);

        $perusahaan->update($validatedData);

         // Log aktivitas
    //     Log::create([
    //     'action' => 'CREATE',
    //     'description' => "Menambahkan karyawan baru: {$request->nama}",
    //     'entity' => 'Karyawan',
    //     'user_id' => auth()->id(),
    // ]);

        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui.');
    }

    // Menghapus Perusahaan
    public function destroyPerusahaan(Perusahaan $perusahaan)
    {
        $perusahaan->delete();
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil dihapus.');
    }

    // Daftar Sumber Dana
    public function daftarSumberDana()
    {
        $perusahaans = Perusahaan::all();
        $karyawans = Karyawan::all();

        return view('daftarSumberDana', compact('perusahaans', 'karyawans'));
    }

    // Mengelola Jadwal
    public function setJadwal()
    {
        $jadwals = Jadwal::all();
        return view('jadwal.set-jadwal', compact('jadwals'));
    }

    public function storeJadwal(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jadwal' => 'required|string|max:255',
            'tipe_jadwal' => 'required|string|in:bulanan,mingguan,tahunan',
            'start_date' => 'nullable|date',
            'cutoff_day' => 'nullable|integer|min:1|max:31',
            'payment_date' => 'required|date',
        ]);

        Jadwal::create($validatedData);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil disimpan.');
    }
    public function index()
{
    $perusahaans = Perusahaan::all();
    $karyawans = Karyawan::all();

    return view('daftarSumberDana', compact('perusahaans', 'karyawans'));
}
}
