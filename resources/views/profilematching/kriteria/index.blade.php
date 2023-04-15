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
            <h6 class="m-0 font-weight-bold text-primary">Kriteria</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('pmkriteria.create') }}" class="btn btn-sm btn-success"><i class="fa-solid fa-square-plus"></i> Tambah Kriteria</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $kriteria)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kriteria->kode_jurusan }}</td>
                            <td>{{ $kriteria->nama_jurusan }}</td>
                            <td>
                                <a href="{{ route('pmkriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmation{{ $kriteria->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <div class="modal fade" id="deleteConfirmation{{ $kriteria->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmation{{ $kriteria->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteConfirmation{{ $kriteria->id }}Label">Konfirmasi hapus data</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('pmkriteria.destroy', $kriteria->id) }}" method="POST">
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