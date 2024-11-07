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
        return view('modules.show', compact('module'));
    }
}
