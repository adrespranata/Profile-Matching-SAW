<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::all();
        return view('nilai.index', compact('nilais'), [
            "title" => "Data Nilai Siswa"
        ]);
    }

    public function create()
    {
        $siswas = Siswa::select('siswa.*')
            ->leftJoin('nilai', 'nilai.siswa_id', '=', 'siswa.id')
            ->whereNull('nilai.id')
            ->get();
        return view('nilai.create', compact('siswas'), [
            "title" => "Tambah Data Nilai Siswa"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id.*' => 'required',
            'ipa.*' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'ips.*' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'matematika.*' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'bahasa_indonesia.*' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'bahasa_inggris.*' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100'
        ]);

        $siswa_id = $request->input('siswa_id');
        $ipa = $request->input('ipa');
        $ips = $request->input('ips');
        $matematika = $request->input('matematika');
        $bahasa_indonesia = $request->input('bahasa_indonesia');
        $bahasa_inggris = $request->input('bahasa_inggris');

        for ($i = 0; $i < count($siswa_id); $i++) {
            $nilai = new Nilai;
            $nilai->siswa_id = $siswa_id[$i];
            $nilai->ipa = $ipa[$i];
            $nilai->ips = $ips[$i];
            $nilai->matematika = $matematika[$i];
            $nilai->bahasa_indonesia = $bahasa_indonesia[$i];
            $nilai->bahasa_inggris = $bahasa_inggris[$i];

            $nilai->save();
        }

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $nilais = Nilai::find($id);
        $siswas = Siswa::all();
        return view('nilai.edit', compact('nilais', 'siswas'), [
            "title" => "Edit Nilai Siswa"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'ipa' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'ips' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'matematika' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'bahasa_indonesia' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100',
            'bahasa_inggris' => 'required|regex:/^\d+(\.\d{1,2})?$/|max:100|between:0,100'
        ]);

        $nilai = Nilai::find($id);

        $nilai->siswa_id = $request->input('siswa_id');
        $nilai->ipa = $request->input('ipa');
        $nilai->ips = $request->input('ips');
        $nilai->matematika = $request->input('matematika');
        $nilai->bahasa_indonesia = $request->input('bahasa_indonesia');
        $nilai->bahasa_inggris = $request->input('bahasa_inggris');

        $nilai->save();
        return redirect()->route('nilai.index')->with('success', 'Nilai Siswa berhasil diupdate!');
    }

    public function destroy($id)
    {
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return redirect()->back()->with('error', 'Data nilai tidak ditemukan');
        }

        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus!');
    }
}
