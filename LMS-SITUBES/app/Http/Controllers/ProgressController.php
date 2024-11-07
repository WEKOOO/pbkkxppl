<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\StudentProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $progress = $user->progress()->with('module', 'exam')->get();

        $totalModules = Module::count();
        $completedModules = $progress->where('status', 'completed')->count();
        $inProgressModules = $progress->where('status', 'in_progress')->count();

        $totalExams = $progress->whereNotNull('exam_id')->count();
        $passedExams = $progress->whereNotNull('exam_id')->where('score', '>=', function ($query) {
            $query->selectRaw('passing_score')
                  ->from('exams')
                  ->whereColumn('exams.id', 'student_progress.exam_id');
        })->count();

        return view('progress.index', [
            'progress' => $progress,
            'totalModules' => $totalModules,
            'completedModules' => $completedModules,
            'inProgressModules' => $inProgressModules,
            'totalExams' => $totalExams,
            'passedExams' => $passedExams,
        ]);
    }
}