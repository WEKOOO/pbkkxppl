<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    
    protected $fillable = [
        'mata_kuliah_id',
        'ruangan',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'foto_ruangan',
        'kapasitas',
        'keterangan'
    ];

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class);
    }
}