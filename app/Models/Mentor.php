<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_bidang',
        'kode_mentor',
        'nama_mentor',
        'tgl_lhr',
        'foto',
        'gender',
        'alamat',
        'email',
        'telepon',
        'created_at',
        'updated_at'
    ];
    protected $timestamps = true;
}
