<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file_path', 'order'];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function progress()
    {
        return $this->hasMany(StudentProgress::class);
    }
}
