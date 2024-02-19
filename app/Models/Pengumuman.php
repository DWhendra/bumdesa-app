<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'judul',
        'deskripsi',
        'tanggal',
        'status',
    ];
}
