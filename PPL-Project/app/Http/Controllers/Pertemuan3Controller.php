<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertemuan3;
use App\Models\Category;

class Pertemuan3Controller extends Controller
{
    public function index()
    {
        $data = Pertemuan3::with('category')->get();
        return view('index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'registered_at' => 'required|date',
            'is_verified' => 'required|boolean',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Pertemuan3::create($validated);

        return redirect('/pertemuan3')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Pertemuan3 $pertemuan3)
    {
        $categories = Category::all();
        return view('edit', compact('pertemuan3', 'categories'));
    }

    public function update(Request $request, Pertemuan3 $pertemuan3)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'registered_at' => 'required|date',
            'is_verified' => 'required|boolean',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $pertemuan3->update($validated);

        return redirect('/pertemuan3')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Pertemuan3 $pertemuan3)
    {
        $pertemuan3->delete();

        return redirect('/pertemuan3')->with('success', 'Data berhasil dihapus');
    }
}