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

    <!-- Pemetaan Nilai GAP -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pemetaan Nilai GAP</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">#</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Nama Siswa</th>
                            <th colspan="5" style="text-align:center;">Jurusan IPA</th>
                            <th colspan="5" style="text-align:center;">Jurusan IPS</th>
                        </tr>
                        <tr>
                            <th style="text-align:center;">IPA</th>
                            <th style="text-align:center;">Matematika</th>
                            <th style="text-align:center;">IPS</th>
                            <th style="text-align:center;"> Inggris</th>
                            <th style="text-align:center;"> Indonesia</th>
                            <th style="text-align:center;">IPA</th>
                            <th style="text-align:center;">Matematika</th>
                            <th style="text-align:center;">IPS</th>
                            <th style="text-align:center;"> Inggris</th>
                            <th style="text-align:center;"> Indonesia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemetaanNilai['IPA'] as $key => $pemetaanData)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pemetaanData['nama'] }}</td>
                            <td>{{ $pemetaanData['pemetaan']['ipa'] }}</td>
                            <td>{{ $pemetaanData['pemetaan']['matematika'] }}</td>
                            <td>{{ $pemetaanData['pemetaan']['ips'] }}</td>
                            <td>{{ $pemetaanData['pemetaan']['bahasa_inggris'] }}</td>
                            <td>{{ $pemetaanData['pemetaan']['bahasa_indonesia'] }}</td>
                            <td>{{ $pemetaanNilai['IPS'][$key]['pemetaan']['ipa'] }}</td>
                            <td>{{ $pemetaanNilai['IPS'][$key]['pemetaan']['matematika'] }}</td>
                            <td>{{ $pemetaanNilai['IPS'][$key]['pemetaan']['ips'] }}</td>
                            <td>{{ $pemetaanNilai['IPS'][$key]['pemetaan']['bahasa_inggris'] }}</td>
                            <td>{{ $pemetaanNilai['IPS'][$key]['pemetaan']['bahasa_indonesia'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- Bobot GAP -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bobot GAP</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">#</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Nama Siswa</th>
                            <th colspan="5" style="text-align:center;">Jurusan IPA</th>
                            <th colspan="5" style="text-align:center;">Jurusan IPS</th>
                        </tr>
                        <tr>
                            <th style="text-align:center;">IPA</th>
                            <th style="text-align:center;">Matematika</th>
                            <th style="text-align:center;">IPS</th>
                            <th style="text-align:center;"> Inggris</th>
                            <th style="text-align:center;"> Indonesia</th>
                            <th style="text-align:center;">IPA</th>
                            <th style="text-align:center;">Matematika</th>
                            <th style="text-align:center;">IPS</th>
                            <th style="text-align:center;"> Inggris</th>
                            <th style="text-align:center;"> Indonesia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bobotGap['IPA'] as $key => $bobotGapData)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bobotGapData['nama'] }}</td>
                            <td>{{ $bobotGapData['bobot_gap']['ipa'] }}</td>
                            <td>{{ $bobotGapData['bobot_gap']['matematika'] }}</td>
                            <td>{{ $bobotGapData['bobot_gap']['ips'] }}</td>
                            <td>{{ $bobotGapData['bobot_gap']['bahasa_inggris'] }}</td>
                            <td>{{ $bobotGapData['bobot_gap']['bahasa_indonesia'] }}</td>
                            <td>{{ $bobotGap['IPS'][$key]['bobot_gap']['ipa'] }}</td>
                            <td>{{ $bobotGap['IPS'][$key]['bobot_gap']['matematika'] }}</td>
                            <td>{{ $bobotGap['IPS'][$key]['bobot_gap']['ips'] }}</td>
                            <td>{{ $bobotGap['IPS'][$key]['bobot_gap']['bahasa_inggris'] }}</td>
                            <td>{{ $bobotGap['IPS'][$key]['bobot_gap']['bahasa_indonesia'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CF & SF -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Core Secondary Factor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">#</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Nama Siswa</th>
                            <th colspan="3" style="text-align:center;">Jurusan IPA</th>
                            <th colspan="3" style="text-align:center;">Jurusan IPS</th>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Core Factor</th>
                            <th style="text-align:center;">Secondary Factor</th>
                            <th style="text-align:center;">Total Factor</th>
                            <th style="text-align:center;">Core Factor</th>
                            <th style="text-align:center;">Secondary Factor</th>
                            <th style="text-align:center;">Total Factor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($csFactor['IPA'] as $key => $csData)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $csData['nama'] }}</td>
                            <td>{{ $csData['core_factor'] }}</td>
                            <td>{{ $csData['secondary_factor'] }}</td>
                            <td>{{ $csData['total_factor'] }}</td>
                            <td>{{ $csFactor['IPS'][$key]['core_factor'] }}</td>
                            <td>{{ $csFactor['IPS'][$key]['secondary_factor'] }}</td>
                            <td>{{ $csFactor['IPS'][$key]['total_factor'] }}</td>
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