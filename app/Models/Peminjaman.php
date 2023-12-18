<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = "tb_peminjaman";
    protected $primaryKey = 'peminjaman_id';
    protected $fillable = [
            'peminjaman_pjmk',
            'peminjaman_ruangkelas',
            'peminjaman_matakuliah',
            'peminjaman_fasilitas',
            'peminjaman_tanggal',
            'peminjaman_waktu_mulai',
            'peminjaman_waktu_selesai'
    ];
}
