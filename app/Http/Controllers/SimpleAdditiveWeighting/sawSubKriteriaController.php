<?php

namespace App\Http\Controllers\SimpleAdditiveWeighting;

use App\Http\Controllers\Controller;
use App\Models\sawKriteria;
use App\Models\sawSubKriteria;
use Illuminate\Http\Request;

class sawSubKriteriaController extends Controller
{
    public function index()
    {
        $subkriterias = sawSubKriteria::all();
        return view('saw.subkriteria.index', compact('subkriterias'), [
            "title" => "Sub Kriteria"
        ]);
    }

    public function create()
    {
        $kriterias = sawKriteria::all();
        return view('saw.subkriteria.create', compact('kriterias'), [
            "title" => "Tambah Sub Kriteria"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sawkriteria_id' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'jenis_kriteria' => 'required'
        ]);

        $subkriteria = new sawSubKriteria();

        $subkriteria->sawkriteria_id = $request->sawkriteria_id;
        $subkriteria->nama_kriteria = $request->nama_kriteria;
        $subkriteria->bobot = $request->bobot;
        $subkriteria->jenis_kriteria = $request->jenis_kriteria;

        $subkriteria->save();

        return redirect()->route('sawsubkriteria.index', $request->get('sawkriteria_id'))
            ->with('success', 'Sub Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $subkriteria = sawSubKriteria::findOrFail($id);
        $kriterias = sawKriteria::all();

        return view('saw.subkriteria.edit', compact('subkriteria', 'kriterias'), [
            "title" => "Edit Sub Kriteria"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sawkriteria_id' => 'required',
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'jenis_kriteria' => 'required'
        ]);

        $subkriteria = sawSubKriteria::findOrFail($id);

        $subkriteria->sawkriteria_id = $request->sawkriteria_id;
        $subkriteria->nama_kriteria = $request->nama_kriteria;
        $subkriteria->bobot = $request->bobot;
        $subkriteria->jenis_kriteria = $request->jenis_kriteria;

        $subkriteria->save();

        return redirect()->route('sawsubkriteria.index', $request->sawkriteria_id)
            ->with('success', 'Sub Kriteria berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subkriteria = sawSubKriteria::findOrFail($id);
        $sawkriteria_id = $subkriteria->sawkriteria_id;
        $subkriteria->delete();

        return redirect()->route('sawsubkriteria.index', $sawkriteria_id)
            ->with('success', 'Sub Kriteria berhasil dihapus.');
    }
}
