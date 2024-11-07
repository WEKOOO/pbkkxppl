<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show(Exam $exam)
    {
        return view('exams.show', compact('exam'));
    }

    public function submit(Request $request, Exam $exam)
    {
        // Logic untuk memproses jawaban ujian
    }
}
