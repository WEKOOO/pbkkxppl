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
        // Ambil semua jawaban dari request
        $answers = $request->except('_token');

        $totalPoints = 0;
        $correctAnswers = [];
        $wrongAnswers = [];

        foreach ($exam->questions as $question) {
            $correctChoice = $question->correct_choice_id; // Misalkan ini adalah ID pilihan yang benar

            if (isset($answers['question-' . $question->id]) && $answers['question-' . $question->id] == $correctChoice) {
                $totalPoints += $question->points; // Tambahkan poin jika jawaban benar
                $correctAnswers[] = $question->id; // Simpan ID pertanyaan yang benar
            } else {
                $wrongAnswers[] = $question->id; // Simpan ID pertanyaan yang salah
            }
        }

        // Simpan hasil ke dalam sesi atau database
        session()->flash('totalPoints', $totalPoints);
        session()->flash('correctAnswers', $correctAnswers);
        session()->flash('wrongAnswers', $wrongAnswers);

        // Redirect ke halaman hasil
        return redirect()->route('exams.results', ['exam' => $exam]);
    }
}