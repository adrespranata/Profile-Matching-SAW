<?php

namespace App\Http\Controllers\ProfileMatching;

use App\Http\Controllers\Controller;
use App\Models\pmBobotGap;
use App\Models\pmSubKriteria;
use Illuminate\Http\Request;

class ProfileMatchingBobotGapController extends Controller
{
    public function index()
    {
        $bobot_gap = pmBobotGap::with('pmsubkriteria.pmkriteria')->get();
        return view('profilematching.bobotgap.index', compact('bobot_gap'), [
            "title" => "Bobot GAP"
        ]);
    }

    public function create()
    {
        $subkriterias = pmSubKriteria::all();
        $bobot_gap = pmBobotGap::all();
        return view('profilematching.bobotgap.create', compact('bobot_gap', 'subkriterias'), [
            "title" => "Tambah Bobot GAP"
        ]);
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'pmsubkriteria_id' => 'required|exists:pm_subkriteria,id',
            'selisih' => 'required|numeric',
            'bobot' => 'required|numeric',
            'keterangan' => 'required|string'
        ]);

        // Simpan bobot gap
        $bobotGap = new pmBobotGap();
        $bobotGap->pmkriteria_id = pmSubKriteria::find($validatedData['pmsubkriteria_id'])->pmkriteria_id;
        $bobotGap->pmsubkriteria_id = $validatedData['pmsubkriteria_id'];
        $bobotGap->selisih = $validatedData['selisih'];
        $bobotGap->bobot = $validatedData['bobot'];
        $bobotGap->keterangan = $validatedData['keterangan'];
        $bobotGap->save();

        return redirect()->route('pmbobotgap.index', $validatedData['pmsubkriteria_id'])
            ->with('success', 'Bobot gap berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $bobot_gap = pmBobotGap::findOrFail($id);
        $subkriterias = pmSubKriteria::all();
        return view('profilematching.bobotgap.edit', compact('bobot_gap', 'subkriterias'), [
            "title" => "Edit Bobot GAP"
        ]);
    }

    public function update(Request $request, $id)
    { // Validasi inputan
        $validatedData = $request->validate([
            'pmsubkriteria_id' => 'required|exists:pm_subkriteria,id',
            'selisih' => 'required|numeric',
            'bobot' => 'required|numeric',
            'keterangan' => 'required|string'
        ]);

        // Update data bobot gap
        $bobotgap = pmBobotGap::findOrFail($id);

        $bobotgap->pmsubkriteria_id = $validatedData['pmsubkriteria_id'];
        $bobotgap->selisih = $validatedData['selisih'];
        $bobotgap->bobot = $validatedData['bobot'];
        $bobotgap->keterangan = $validatedData['keterangan'];
        $bobotgap->save();

        return redirect()->route('pmbobotgap.index', $validatedData['pmsubkriteria_id'])
            ->with('success', 'Bobot gap berhasil diupdate.');
    }

    public function destroy($id)
    {
        $bobot_gap = pmBobotGap::findOrFail($id);
        $subkriteria_id = $bobot_gap->pmsubkriteria_id;
        $bobot_gap->delete();

        return redirect()->route('pmbobotgap.index', $subkriteria_id)
            ->with('success', 'Bobot gap berhasil dihapus.');
    }
}
