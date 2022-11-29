<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModul extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_modul',
        'created_at',
        'updated_at'
    ];
    protected $timestamps = true;
}
