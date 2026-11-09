<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data_mhs = Mahasiswa::all();

        return view('mahasiswa.index', compact('data_mhs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
