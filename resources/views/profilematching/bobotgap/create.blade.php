@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Tambah Bobot GAP') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('pmbobotgap.store') }}">
            @csrf

            <div class="form-group">
                <label for="pmsubkriteria_id">Sub Kriteria</label>
                <select name="pmsubkriteria_id" id="pmsubkriteria_id" class="form-control" required>
                    <option value="">Pilih Sub Kriteria</option>
                    @foreach($subkriterias as $subkriteria)
                    <option value="{{ $subkriteria->id }}">{{ $subkriteria->pmkriteria->kode_jurusan }} - {{ $subkriteria->nama_kriteria }}</option>
                    @endforeach
                </select>

                @error('pmsubkriteria_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="selisih">Selisih</label>
                <input type="number" name="selisih" id="selisih" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bobot">Bobot</label>
                <input type="number" name="bobot" id="bobot" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-success"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>
        </form>

    </div>
</div>
@endsection