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
        // Definisikan status dan warna status
        $status = 'active'; // Ganti dengan logika untuk mendapatkan status yang sesuai
        $statusColors = [
            'active' => 'bg-green-500',
            'inactive' => 'bg-red-500',
            // Tambahkan status lainnya sesuai kebutuhan
        ];
        $statusText = [
            'active' => 'Aktif',
            'inactive' => 'Tidak Aktif',
            // Tambahkan teks status lainnya sesuai kebutuhan
        ];

        return view('modules.show', compact('module', 'status', 'statusColors', 'statusText'));
    }

}
