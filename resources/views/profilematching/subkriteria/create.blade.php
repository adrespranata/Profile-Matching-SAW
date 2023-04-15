@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Tambah Sub Kriteria') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('pmsubkriteria.store') }}">
            @csrf

            <div class="form-group">
                <label for="pmkriteria_id">Kriteria</label>
                <select id="pmkriteria_id" name="pmkriteria_id" class="form-control" required>
                    <option value="">Pilih Kriteria</option>
                    @foreach($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}">{{ $kriteria->kode_jurusan }}</option>
                    @endforeach
                </select>
                @error('pmkriteria_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_kriteria">Sub Kriteria</label>
                <select class="form-control" id="nama_kriteria" name="nama_kriteria" required>
                    <option value="">Pilih Sub Kriteria</option>
                    <option value="ipa">IPA</option>
                    <option value="matematika">Matematika</option>
                    <option value="ips">IPS</option>
                    <option value="bahasa_indonesia">Bahasa Indonesia</option>
                    <option value="bahasa_inggris">Bahasa Inggris</option>
                </select>
                @error('nama_kriteria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bobot">Bobot</label>
                <input type="number" name="bobot" id="bobot" class="form-control @error('bobot') is-invalid @enderror" value="{{ old('bobot') }}" required autofocus>
                @error('bobot')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kriteria">Jenis Kriteria</label>
                <select id="jenis_kriteria" name="jenis_kriteria" class="form-control">
                    <option value="">Pilih Jenis Kriteria</option>
                    <option value="Core Factor">Core Factor</option>
                    <option value="Secondary Factor">Secondary Factor</option>
                </select>
                @error('jenis_kriteria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-success"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>

        </form>
    </div>
</div>
@endsection