<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PJMK extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    ];
}
