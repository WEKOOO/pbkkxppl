<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertemuan3; // pastikan modelnya sudah dibuat

class Pertemuan3Controller extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel pertemuan3_table
        $data = Pertemuan3::all();
        
        // Kirim data ke view index
        return view('index', compact('data'));
    }

    // Method create untuk membuka form input data
    public function create()
    {
        return view('create');
    }

    // Method store untuk menyimpan data input ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'registered_at' => 'required|date',
            'is_verified' => 'required|boolean'
        ]);

        // Simpan data ke tabel
        Pertemuan3::create([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'status' => $request->status,
            'registered_at' => $request->registered_at,
            'is_verified' => $request->is_verified,
        ]);
        $data = Pertemuan3::all(); // Mengambil semua data dari tabel pertemuan3_table
            return view('index', compact('data'));

           

    }
    public function edit(Pertemuan3 $pertemuan3){
        return view("edit", ["pertemuan3" => $pertemuan3]);
    }

    public function update(Request $request, Pertemuan3 $pertemuan3)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'registered_at' => 'required|date',
            'is_verified' => 'required|boolean',
        ]);

        $pertemuan3->update($validated);

        return redirect('/pertemuan3')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(Pertemuan3 $pertemuan3){
        $pertemuan3->delete();

        return redirect('/pertemuan3')->with('success', 'Data Berhasil Dihapus');
    }
}
