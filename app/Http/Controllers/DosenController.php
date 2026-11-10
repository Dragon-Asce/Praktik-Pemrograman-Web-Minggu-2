<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $data_dosen = Dosen::orderBy('nidn')->get();

        return view('dosen.index', compact('data_dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama' => 'required|min:3',
            'bidang_keahlian' => 'required',
        ]);

        Dosen::create($request->only(['nidn', 'nama', 'bidang_keahlian']));

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama' => 'required|min:3',
            'bidang_keahlian' => 'required',
        ]);

        $dosen->update($request->only(['nidn', 'nama', 'bidang_keahlian']));

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}
