<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'program_studi',
        'deskripsi',
        'status_aktif',
        'silabus_file',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
        'program_studi' => 'string'
    ];

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }
}