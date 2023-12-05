<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJMK extends Model
{
    use HasFactory;

    protected $table = 'tb_pjmk';
    protected $primaryKey = "pjmk_nim";
    protected $fillable = [
        'pjmk_nim',
        'pjmk_nama',
        'pjmk_kelas',
        'pjmk_prodi',
        'pjmk_phone',
        'pjmk_email',
        'pjmk_img',
        'pjmk_password',
    ];
}
