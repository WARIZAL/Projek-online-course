<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    use HasFactory;
    protected $fillable = ['nama',    'logo',    'tentang', 'created_at', 'updated_at'];
    protected $timestamps = true;
}
