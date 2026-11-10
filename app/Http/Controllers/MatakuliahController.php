<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $data_matakuliah = Matakuliah::orderBy('kode_mk')->get();

        return view('matakuliah.index', compact('data_matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required|min:3',
            'sks' => 'required|integer|min:1|max:8',
        ]);

        Matakuliah::create($request->only(['kode_mk', 'nama_mk', 'sks']));

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk,' . $matakuliah->id,
            'nama_mk' => 'required|min:3',
            'sks' => 'required|integer|min:1|max:8',
        ]);

        $matakuliah->update($request->only(['kode_mk', 'nama_mk', 'sks']));

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
