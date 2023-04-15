<?php

namespace App\Http\Controllers\SimpleAdditiveWeighting;

use App\Http\Controllers\Controller;
use App\Models\sawKriteria;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class sawKriteriaController extends Controller
{
    public function index()
    {
        $sawKriteria = sawKriteria::all();
        return view('saw.kriteria.index', compact('sawKriteria'), [
            "title" => "Kriteria"
        ]);
    }

    public function create()
    {
        return view('saw.kriteria.create', [
            "title" => "Tambah Kriteria"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan' => 'required|unique:pm_kriteria',
            'nama_jurusan' => 'required|unique:pm_kriteria',
        ]);

        sawKriteria::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('sawkriteria.index')->with('success', 'Data kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kriteria = sawKriteria::find($id);
        return view('saw.kriteria.edit', compact('kriteria'), [
            "title" => "Edit Kriteria"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required'
        ]);

        $kriteria = sawKriteria::find($id);
        $kriteria->kode_jurusan = $request->get('kode_jurusan');
        $kriteria->nama_jurusan = $request->get('nama_jurusan');
        $kriteria->save();

        return redirect()->route('sawkriteria.index')->with('success', 'Data kriteria berhasil diupdate');
    }

    public function destroy($id)
    {
        $kriteria = sawKriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('sawkriteria.index')->with('success', 'Data kriteria berhasil dihapus');
    }
}
