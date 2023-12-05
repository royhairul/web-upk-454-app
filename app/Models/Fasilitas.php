<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = "tb_fasilitas";
    protected $fillable = [
        'fasilitas_id',
        'fasilitas_name',
        'fasilitas_type'
    ];
}
