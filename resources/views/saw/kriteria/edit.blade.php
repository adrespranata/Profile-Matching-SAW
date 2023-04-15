@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Edit Kriteria') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('sawkriteria.update', $kriteria->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode_jurusan">Kode Jurusan</label>
                <input type="text" class="form-control @error('kode_jurusan') is-invalid @enderror" id="kode_jurusan" name="kode_jurusan" value="{{ $kriteria->kode_jurusan }}" required>
                @error('kode_jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_jurusan">Nama Jurusan</label>
                <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" name="nama_jurusan" value="{{ $kriteria->nama_jurusan }}" required>
                @error('nama_jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>
    </div>
</div>
@endsection