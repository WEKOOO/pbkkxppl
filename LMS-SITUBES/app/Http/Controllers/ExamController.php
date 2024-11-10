<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function show($moduleId)
    {
        // Ambil soal berdasarkan moduleId
        $soal = [
            ['id' => 1, 'pertanyaan' => 'Apa warna langit?', 'jawaban' => 'Biru'],
            ['id' => 2, 'pertanyaan' => 'Apa ibukota Indonesia?', 'jawaban' => 'Jakarta'],
            // Tambahkan soal lainnya
        ];
        
        return view('exams.show', compact('soal', 'moduleId'));
    }

    public function submit(Request $request)
    {
        $jawabanBenar = 0;
        $jawabanSalah = 0;

        // Validasi input
        $request->validate([
            'jawaban.*' => 'required|string',
        ]);

        // Asumsikan kita punya soal dengan jawaban yang benar
        $soal = [
            ['id' => 1, 'jawaban' => 'Biru'],
            ['id' => 2, 'jawaban' => 'Jakarta'],
            // Tambahkan soal lainnya
        ];

        foreach ($soal as $item) {
            if ($request->input('jawaban.' . $item['id']) == $item['jawaban']) {
                $jawabanBenar++;
            } else {
                $jawabanSalah++;
            }
        }

        // Simpan hasil ke session untuk flash message jika diperlukan
        session()->flash('hasil', [
            'benar' => $jawabanBenar,
            'salah' => $jawabanSalah
        ]);

        return view('exams.result', [
            'jawabanBenar' => $jawabanBenar,
            'jawabanSalah' => $jawabanSalah,
            'moduleId' => $request->moduleId // Pastikan moduleId dikirim dari form
        ]);
    }
}