<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all()->map(function ($item) {
            $item->tanggal_lahir = Carbon::parse($item->tanggal_lahir)->locale('id_ID')->isoFormat('DD MMMM YYYY');
            return $item;
        });
        return view('siswa.index', compact('siswa'), [
            "title" => "Data Siswa"
        ]);
    }

    public function create()
    {
        return view('siswa.create', [
            "title" => "Tambah Data Siswa"
        ]);
    }

    public function store(Request $request)
    {
        // validasi inputan
        $validatedData = $request->validate([
            'nisn' => 'required|unique:siswa,nisn|max:10',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|max:20',
            'alamat' => 'required',
        ]);

        // buat objek siswa baru
        $siswa = new Siswa();

        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->no_telepon = $request->no_telepon;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        // redirect ke halaman daftar siswa
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $siswa->tanggal_lahir = Carbon::parse($siswa->tanggal_lahir)->format('Y-m-d');

        return view('siswa.edit', compact('siswa'), [
            "title" => "Edit Data Siswa"
        ]);
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);

        // Cari siswa yang akan diupdate
        $siswa = Siswa::findOrFail($id);

        // Update data siswa
        $siswa->nama = $request->input('nama');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->tempat_lahir = $request->input('tempat_lahir');
        $siswa->tanggal_lahir = $request->input('tanggal_lahir');
        $siswa->no_telepon = $request->input('no_telepon');
        $siswa->alamat = $request->input('alamat');
        $siswa->save();

        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        if (!$siswa) {
            return back()->with('error', 'siswa not found');
        }
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
