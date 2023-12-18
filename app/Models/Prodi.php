<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    
    protected $table = 'tb_prodi';
    protected $primaryKey = 'prodi_code';
    protected $fillable = ['prodi_code','prodi_nama', 'prodi_jurusan'];
}
