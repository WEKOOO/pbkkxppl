<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    use HasFactory;

    protected $table = 'student_progress';
    
    protected $fillable = ['user_id', 'module_id', 'exam_id', 'score', 'status', 'completed_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
