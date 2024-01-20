<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = "tb_matakuliah";
    protected $primaryKey = 'matakuliah_id';
    protected $fillable = [
        'matakuliah_id',
        'matakuliah_nama',
        'matakuliah_dosen',
    ];

    protected $keyType = 'string';
}
