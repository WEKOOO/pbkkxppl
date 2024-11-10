<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all(); // Ganti dengan logika yang sesuai untuk mendapatkan modul
        return view('modules.index', compact('modules'));
    }

    public function show(Module $module)
    {
        // Definisikan status dan warna
        $status = 'success'; // Contoh status, bisa disesuaikan dengan logika Anda
        $statusColors = [
            'success' => 'bg-green-500',
            'error' => 'bg-red-500',
            'warning' => 'bg-yellow-500',
        ];
        $statusText = [
            'success' => 'Berhasil',
            'error' => 'Gagal',
            'warning' => 'Peringatan',
        ];

        return view('modules.show', compact('module', 'status', 'statusColors', 'statusText'));
    }

}
