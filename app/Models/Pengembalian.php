<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = "tb_pengembalian";
    protected $primaryKey = 'pengembalian_id';
    protected $fillable = [
            'pengembalian_id',
            'pengembalian_pinjam',
            'pengembalian_foto_sebelum',
            'pengembalian_foto_sesudah',
            'pengembalian_waktu',
    ];
}
