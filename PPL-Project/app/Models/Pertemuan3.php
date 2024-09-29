<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan3 extends Model
{
    use HasFactory;
    // Tentukan nama tabel secara eksplisit
    protected $table = 'example';

    // Tentukan kolom yang boleh diisi secara massal
    protected $fillable = ['nama', 'umur', 'status', 'registered_at', 'is_verified'];
}
