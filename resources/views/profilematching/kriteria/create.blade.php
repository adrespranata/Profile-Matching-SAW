@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Tambah Kriteria') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('pmkriteria.store') }}">
            @csrf
            <div class="form-group">
                <label for="kode_jurusan">Kode Jurusan</label>
                <input type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" id="kode_jurusan" name="kode_jurusan" value="{{ old('kode_jurusan') }}" required>
                @error('kode_jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan') }}" required>
                @error('nama_jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-success"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>
        </form>

    </div>
</div>
@endsection