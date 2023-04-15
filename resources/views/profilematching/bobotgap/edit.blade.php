@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Edit Bobot GAP') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('pmbobotgap.update', $bobot_gap->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="pmsubkriteria_id">Sub Kriteria</label>
                <select name="pmsubkriteria_id" id="pmsubkriteria_id" class="form-control" required>
                    <option value="">Pilih Sub Kriteria</option>
                    @foreach($subkriterias as $subkriteria)
                    <option value="{{ $subkriteria->id }}" {{ $subkriteria->id == $bobot_gap->pmsubkriteria_id ? 'selected' : '' }}>{{ $subkriteria->pmkriteria->kode_jurusan }} - {{ $subkriteria->nama_kriteria }}</option>
                    @endforeach
                </select>
                @error('pmsubkriteria_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="selisih">Selisih</label>
                <input type="number" class="form-control @error('selisih') is-invalid @enderror" id="selisih" name="selisih" value="{{ old('selisih', $bobot_gap->selisih) }}" required>
                @error('selisih')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bobot">Bobot</label>
                <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ old('bobot', $bobot_gap->bobot) }}" required>
                @error('bobot')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan', $bobot_gap->keterangan) }}" required>
                @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary "><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </form>
    </div>
</div>
@endsection