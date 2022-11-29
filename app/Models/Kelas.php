<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_bidang',
        'jenis_kelas',
        'harga_kelas',
        'lama_course',
        'tgl_bayar',
        'tanggal_berakhir',
        'created_at',
        'updated_at'
    ];
    protected $timestamps = true;
}