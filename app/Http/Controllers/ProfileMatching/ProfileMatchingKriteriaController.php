<?php

namespace App\Http\Controllers\ProfileMatching;

use App\Http\Controllers\Controller;
use App\Models\pmKriteria;
use Illuminate\Http\Request;

class ProfileMatchingKriteriaController extends Controller
{
    public function index()
    {
        $kriterias = pmKriteria::all();
        return view('profilematching.kriteria.index', compact('kriterias'), [
            "title" => "Kriteria"
        ]);
    }

    public function create()
    {
        return view('profilematching.kriteria.create', [
            "title" => "Tambah Kriteria"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan' => 'required|unique:pm_kriteria',
            'nama_jurusan' => 'required|unique:pm_kriteria',
        ]);

        pmKriteria::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('pmkriteria.index')->with('success', 'Data kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kriteria = pmKriteria::find($id);
        return view('profilematching.kriteria.edit', compact('kriteria'), [
            "title" => "Edit Kriteria"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required'
        ]);

        $kriteria = pmKriteria::find($id);
        $kriteria->kode_jurusan = $request->get('kode_jurusan');
        $kriteria->nama_jurusan = $request->get('nama_jurusan');
        $kriteria->save();

        return redirect()->route('pmkriteria.index')->with('success', 'Data kriteria berhasil diupdate');
    }

    public function destroy($id)
    {
        $kriteria = pmKriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('pmkriteria.index')->with('success', 'Data kriteria berhasil dihapus');
    }
}
