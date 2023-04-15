@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Edit Nilai Siswa') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('nilai.update', $nilais->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="siswa_id">Nama Siswa</label>
                <select class="form-control" id="siswa_id" name="siswa_id" disabled>
                    @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}" @if ($siswa->id == $nilais->siswa_id) selected @endif>{{ $siswa->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ipa">Nilai IPA</label>
                <input type="number" name="ipa" class="form-control" id="ipa" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" value="{{ $nilais->ipa }}">
            </div>
            <div class="form-group">
                <label for="ips">Nilai IPS</label>
                <input type="number" name="ips" class="form-control" id="ips" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" value="{{ $nilais->ips }}">
            </div>
            <div class="form-group">
                <label for="matematika">Nilai Matematika</label>
                <input type="number" name="matematika" class="form-control" id="matematika" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" value="{{ $nilais->matematika }}">
            </div>
            <div class="form-group">
                <label for="bahasa_indonesia">Nilai Bahasa Indonesia</label>
                <input type="number" name="bahasa_indonesia" class="form-control" id="bahasa_indonesia" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" value="{{ $nilais->bahasa_indonesia }}">
            </div>
            <div class="form-group">
                <label for="bahasa_inggris">Nilai Bahasa Inggris</label>
                <input type="number" name="bahasa_inggris" class="form-control" id="bahasa_inggris" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" value="{{ $nilais->bahasa_inggris }}">
            </div>

            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            <button type="cancel" class="btn btn-sm btn-secondary">Cancel</button>
        </form>
    </div>
</div>
@endsection