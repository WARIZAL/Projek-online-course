<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primarykey = 'id_member';
    protected $fillable = [
        'id_user',
        'kode_member',
        'nama_member',
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
