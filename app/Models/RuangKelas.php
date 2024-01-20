<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;

    protected $table = 'tb_ruangkelas';
    protected $primaryKey = 'ruangkelas_code';
    protected $fillable = [
        'ruangkelas_code',
        'ruangkelas_kapasitas',
        'ruangkelas_prodi',
        'ruangkelas_status'
    ];

    protected $keyType = 'string';
}
