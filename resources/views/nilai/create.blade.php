@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Tambah Nilai Siswa') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('nilai.store') }}" id="form-tambah-nilai">
            @csrf
            <table class="table" id="table-tambah-nilai">
                <thead>
                    <tr>
                        <th style="width: 200px;">Nama Siswa</th>
                        <th>Nilai IPA</th>
                        <th>Nilai IPS</th>
                        <th>Nilai Matematika</th>
                        <th>Nilai Bahasa Indonesia</th>
                        <th>Nilai Bahasa Inggris</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="form-siswa-1">
                        <td>
                            <select name="siswa_id[]" id="siswa_id_1" class="form-control" required>
                                <option value="">Pilih Siswa</option>
                                @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="ipa[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>
                        <td><input type="number" name="ips[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>
                        <td><input type="number" name="matematika[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>
                        <td><input type="number" name="bahasa_indonesia[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>
                        <td><input type="number" name="bahasa_inggris[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-success btn-tambah-siswa"><i class="fa-solid fa-square-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-success"><i class="fa-solid fa-arrows-rotate"></i> Reset</button>
        </form>
    </div>

</div>
<script>
    $(document).ready(function() {
        var i = 2;

        // Tambahkan form input nilai baru ketika button "Tambah Siswa" di klik
        $('#table-tambah-nilai').on('click', '.btn-tambah-siswa', function(e) {
            console.log("Tombol tambah siswa diklik"); // menampilkan pesan di console
            e.preventDefault();
            var newForm = '<tr id="form-siswa-' + i + '">' +
                '<td>' +
                '<select name="siswa_id[]" id="siswa_id_' + i + '" class="form-control">' +
                '<option value="">Pilih Siswa</option>' +
                '@foreach ($siswas as $siswa)' +
                '<option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>' +
                '@endforeach' +
                '</select>' +
                '</td>' +
                '<td><input type="number" name="ipa[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>' +
                '<td><input type="number" name="ips[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>' +
                '<td><input type="number" name="matematika[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>' +
                '<td><input type="number" name="bahasa_indonesia[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>' +
                '<td><input type="number" name="bahasa_inggris[]" class="form-control" step="0.01" min="0" max="100" pattern="\d{1,3}(\.\d{1,2})?" required></td>' +
                '<td>' +
                '<div class="btn-group" role="group">' +
                '<button type="button" class="btn btn-sm btn-success btn-tambah-siswa"><i class="fa-solid fa-square-plus"></i></button>' +
                '<button type="button" class="btn btn-sm btn-danger btn-hapus-siswa"><i class="fa-solid fa-square-minus"></i></button>' +
                '</div>' +
                '</td>' +
                '</tr>';
            $('#table-tambah-nilai tbody').append(newForm);
            i++;
        });


        // Hapus form input nilai ketika button "Hapus" di klik
        $('#table-tambah-nilai').on('click', '.btn-hapus-siswa', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

    });
</script>
@endsection