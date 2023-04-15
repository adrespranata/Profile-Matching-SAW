<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index()
    {
        $bobots = Bobot::all();
        return view('bobot.index', compact('bobots'), [
            "title" => "Bobot"
        ]);
    }

    public function create()
    {
        return view('bobot.create', [
            "title" => "Tambah Data Bobot"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nilai_awal' => 'required',
            'nilai_akhir' => 'required',
            'nilai_bobot' => 'required|unique:bobot',
        ]);

        Bobot::create([
            'nilai_awal' => $request->nilai_awal,
            'nilai_akhir' => $request->nilai_akhir,
            'nilai_bobot' => $request->nilai_bobot,
        ]);

        return redirect()->route('bobot.index')
            ->with('success', 'Bobot berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $bobot = Bobot::find($id);

        return view('bobot.edit', compact('bobot'), [
            "title" => "Edit Data Bobot"
        ]);
    }

    public function update(Request $request, $id)
    {
        $bobot = Bobot::find($id);

        $bobot->nilai_awal = $request->nilai_awal;
        $bobot->nilai_akhir = $request->nilai_akhir;
        $bobot->nilai_bobot = $request->nilai_bobot;

        $bobot->save();

        return redirect()->route('bobot.index')->with('success', 'Bobot berhasil diubah.');
    }

    public function destroy($id)
    {
        $bobot = Bobot::find($id);

        if ($bobot) {
            $bobot->delete();
            return redirect()->route('bobot.index')->with('success', 'Bobot berhasil dihapus');
        } else {
            return redirect()->route('bobot.index')->with('error', 'Bobot tidak ditemukan');
        }
    }
}
