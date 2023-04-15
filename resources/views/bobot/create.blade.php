@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Tambah Bobot') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('bobot.store') }}">
            @csrf

            <div class="form-group">
                <label for="nilai_awal">Nilai Awal</label>
                <input type="number" class="form-control @error('nilai_awal') is-invalid @enderror" id="nilai_awal" name="nilai_awal" value="{{ old('nilai_awal') }}" required>
                @error('nilai_awal')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nilai_akhir">Nilai Akhir</label>
                <input type="number" class="form-control @error('nilai_akhir') is-invalid @enderror" id="nilai_akhir" name="nilai_akhir" value="{{ old('nilai_akhir') }}" required>
                @error('nilai_akhir')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nilai_bobot">Bobot</label>
                <input type="number" class="form-control @error('nilai_bobot') is-invalid @enderror" id="nilai_bobot" name="nilai_bobot" value="{{ old('nilai_bobot') }}" required>
                @error('nilai_bobot')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-success"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>
        </form>

    </div>
</div>
@endsection