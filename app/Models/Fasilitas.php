<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = "tb_fasilitas";
    protected $primaryKey = "fasilitas_code";
    protected $fillable = [
        'fasilitas_code',
        'fasilitas_name',
        'fasilitas_type',
        'fasilitas_status',
    ];
    protected $keyType = "string";
}
