<?php

namespace App\Http\Controllers\ProfileMatching;

use App\Http\Controllers\Controller;
use App\Models\pmKriteria;
use App\Models\pmSubKriteria;
use Illuminate\Http\Request;

class ProfileMatchingSubKriteriaController extends Controller
{
    public function index()
    {
        $subkriterias = pmSubKriteria::all();
        return view('profilematching.subkriteria.index', compact('subkriterias'), [
            "title" => "Sub Kriteria"
        ]);
    }

    public function create()
    {
        $kriterias = pmKriteria::all();
        return view('profilematching.subkriteria.create', compact('kriterias'), [
            "title" => "Tambah Sub Kriteria"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'jenis_kriteria' => 'required',
            'pmkriteria_id' => 'required'
        ]);

        $subkriteria = new pmSubKriteria();

        $subkriteria->nama_kriteria = $request->nama_kriteria;
        $subkriteria->bobot = $request->bobot;
        $subkriteria->jenis_kriteria = $request->jenis_kriteria;
        $subkriteria->pmkriteria_id = $request->pmkriteria_id;

        $subkriteria->save();

        return redirect()->route('pmsubkriteria.index', $request->get('pmkriteria_id'))
            ->with('success', 'Sub Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $subkriteria = pmSubKriteria::findOrFail($id);
        $kriterias = pmKriteria::all();

        return view('profilematching.subkriteria.edit', compact('subkriteria', 'kriterias'), [
            "title" => "Edit Sub Kriteria"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'jenis_kriteria' => 'required',
            'pmkriteria_id' => 'required'
        ]);

        $subkriteria = pmSubKriteria::findOrFail($id);

        $subkriteria->nama_kriteria = $request->nama_kriteria;
        $subkriteria->bobot = $request->bobot;
        $subkriteria->jenis_kriteria = $request->jenis_kriteria;
        $subkriteria->pmkriteria_id = $request->pmkriteria_id;

        $subkriteria->save();

        return redirect()->route('pmsubkriteria.index', $request->pmkriteria_id)
            ->with('success', 'Sub Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subkriteria = pmSubKriteria::findOrFail($id);
        $pmkriteria_id = $subkriteria->pmkriteria_id;
        $subkriteria->delete();

        return redirect()->route('pmsubkriteria.index', $pmkriteria_id)
            ->with('success', 'Sub Kriteria berhasil dihapus.');
    }
}
