@extends('layouts.main')
@section('container')
<div class="container-fluid">
    <!-- Konversi Nilai-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Konversi Nilai Siswa</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>IPA</th>
                            <th>Matematika</th>
                            <th>IPS</th>
                            <th>Inggris</th>
                            <th>Indonesia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($konversiNilai as $nilai)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $nilai['nama'] }}</td>
                            <td>{{ $nilai['ipa'] }}</td>
                            <td>{{ $nilai['matematika'] }}</td>
                            <td>{{ $nilai['ips'] }}</td>
                            <td>{{ $nilai['bahasa_inggris'] }}</td>
                            <td>{{ $nilai['bahasa_indonesia'] }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Normalisasi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Normalisasi</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>IPA</th>
                            <th>Matematika</th>
                            <th>IPS</th>
                            <th>Inggris</th>
                            <th>Indonesia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($normalisasi as $norm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $norm['nama'] }}</td>
                            <td>{{ $norm['ipa'] }}</td>
                            <td>{{ $norm['matematika'] }}</td>
                            <td>{{ $norm['ips'] }}</td>
                            <td>{{ $norm['bahasa_inggris'] }}</td>
                            <td>{{ $norm['bahasa_indonesia'] }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Nilai Akhir -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pencarian Nilai Akhir</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Jurusan IPA</th>
                            <th>Jurusan IPS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hasil['IPA'] as $key => $hsl)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hsl['nama'] }}</td>
                            <td>{{ $hsl['nilai'] }}</td>
                            <td>{{ $hasil['IPS'][$key]['nilai'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Rekomendasi -->
    <div class="row">
        <div class="col-md-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekomendasi Jurusan IPA</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center; vertical-align: middle;">#</th>
                                    <th style="text-align:center; vertical-align: middle;">Nama Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rekom['IPA'] as $key => $nama)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $nama }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekomendasi Jurusan IPS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align:center; vertical-align: middle;">#</th>
                                    <th style="text-align:center; vertical-align: middle;">Nama Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rekom['IPS'] as $key => $nama)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $nama }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection