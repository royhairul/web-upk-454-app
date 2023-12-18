<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'tb_jadwal';
    protected $fillable = [
        'jadwal_hari',
        'jadwal_matakuliah',
        'jadwal_waktu_mulai',
        'jadwal_waktu_selesai',
        'jadwal_ruangkelas'
    ];
}
