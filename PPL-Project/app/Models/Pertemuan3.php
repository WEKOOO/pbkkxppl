<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan3 extends Model
{
    use HasFactory;
    
    protected $table = 'example';

    protected $fillable = ['nama', 'umur', 'status', 'registered_at', 'is_verified', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}