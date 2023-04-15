@extends('layouts.main')
@section('container')
<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Nilai Siswa</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('nilai.create') }}" class="btn btn-sm btn-success"><i class="fa-solid fa-square-plus"></i> Tambah Nilai Siswa</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>IPA</th>
                            <th>IPS</th>
                            <th>Matematika</th>
                            <th>Bahasa Indonesia</th>
                            <th>Bahasa Inggris</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilais as $nilai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $nilai->siswa->nama }}</td>
                            <td>{{ $nilai->ipa }}</td>
                            <td>{{ $nilai->ips }}</td>
                            <td>{{ $nilai->matematika }}</td>
                            <td>{{ $nilai->bahasa_indonesia }}</td>
                            <td>{{ $nilai->bahasa_inggris }}</td>
                            <td>
                                <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmation{{ $nilai->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="modal fade" id="deleteConfirmation{{ $nilai->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmation{{ $nilai->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteConfirmation{{ $nilai->id }}Label">Konfirmasi hapus data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection