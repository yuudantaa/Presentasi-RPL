<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perusahaan; // Sesuaikan dengan namespace model Perusahaan

class Karyawan extends Model
{
    protected $table = 'karyawan'; // Tabel di database
    protected $primaryKey = 'id';  // Primary key

    protected $fillable = [
        'nama',
        'nama_bank',
        'no_rekening',
        'status',
        'department',
        'joining_date',
        'perusahaan_id',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function sumberDana()
    {
        return $this->belongsTo(SumberDana::class);
    }
    public function calculateSaldo()
    {
        // Your logic for calculating saldo
        return 1000000; // Dummy example
    }

}
