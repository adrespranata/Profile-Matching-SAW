@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Edit Sub Kriteria') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('pmsubkriteria.update', $subkriteria->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="pmkriteria_id">Kriteria</label>
                <select id="pmkriteria_id" name="pmkriteria_id" class="form-control" required>
                    <option value="">Pilih Kriteria</option>
                    @foreach($kriterias as $kriteria)
                    <option value="{{ $kriteria->id }}" {{ $kriteria->id == $subkriteria->pmkriteria_id  ? 'selected' : '' }}>{{ $kriteria->kode_jurusan }}</option>
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
                    <option value="ipa" {{ $subkriteria->nama_kriteria == 'ipa' ? 'selected' : '' }}>IPA</option>
                    <option value="matematika" {{ $subkriteria->nama_kriteria == 'matematika' ? 'selected' : '' }}>Matematika</option>
                    <option value="ips" {{ $subkriteria->nama_kriteria == 'ips' ? 'selected' : '' }}>IPS</option>
                    <option value="bahasa_indonesia" {{ $subkriteria->nama_kriteria == 'bahasa_indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                    <option value="bahasa_inggris" {{ $subkriteria->nama_kriteria == 'bahasa_inggris' ? 'selected' : '' }}>Bahasa Inggris</option>

                </select>
                @error('nama_kriteria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bobot">Bobot</label>
                <input type="text" name="bobot" id="bobot" class="form-control @error('bobot') is-invalid @enderror" value="{{ $subkriteria->bobot }}" required autofocus>
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
                    <option value="Core Factor" {{ $subkriteria->jenis_kriteria == 'Core Factor' ? 'selected' : '' }}>Core Factor</option>
                    <option value="Secondary Factor" {{ $subkriteria->jenis_kriteria == 'Secondary Factor' ? 'selected' : '' }}>Secondary Factor</option>
                </select>
                @error('jenis_kriteria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>

        </form>
    </div>
</div>
@endsection