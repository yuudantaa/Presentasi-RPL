<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    
    protected $fillable =
    [
        'nama_jadwal',
        'tipe_jadwal',
        'start_date',
        'cutoff_day',
        'payment_date',
    ];
}
