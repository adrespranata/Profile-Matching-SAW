<?php

namespace App\Http\Controllers\SimpleAdditiveWeighting;

use App\Http\Controllers\Controller;
use App\Models\sawKriteria;
use App\Models\sawSubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sawHasilAkhirController extends Controller
{

    public function index()
    {
        // Memanggil function konversiNilai
        $konversiNilai = $this->konversiNilai();
        $normalisasi = $this->normalisasi();
        $hasil = [
            'IPA' => $this->hitungNilaiAkhir('IPA'),
            'IPS' => $this->hitungNilaiAkhir('IPS')
        ];

        $rekom = $this->rekomendasi();
        // Menampilkan hasil
        return view('saw.hasil.index', [
            "title" => "Proses Profile Matching",
            'konversiNilai' => $konversiNilai,
            'normalisasi' => $normalisasi,
            'hasil' => $hasil,
            'rekom' => $rekom
        ]);
    }

    public function konversiNilai()
    {
        // Mengambil data nilai siswa dan nama siswa dari tabel nilai dan siswa
        $nilaiSiswa = DB::table('nilai')
            ->join('siswa', 'nilai.siswa_id', '=', 'siswa.id')
            ->select('siswa.nama', 'ipa', 'ips', 'matematika', 'bahasa_indonesia', 'bahasa_inggris')
            ->get();

        // Mengambil data bobot dari tabel bobot
        $bobot = DB::table('bobot')
            ->select('nilai_awal', 'nilai_akhir', 'nilai_bobot')
            ->get();

        // Menyimpan data bobot dalam array
        $bobotArr = [];
        foreach ($bobot as $b) {
            $bobotArr[] = [
                'nilai_awal' => $b->nilai_awal,
                'nilai_akhir' => $b->nilai_akhir,
                'nilai_bobot' => $b->nilai_bobot
            ];
        }

        // Konversi nilai siswa ke nilai bobot
        $konversiNilai = [];
        foreach ($nilaiSiswa as $nilai) {
            $konversi = [];
            foreach ($nilai as $key => $value) {
                // Cari bobot berdasarkan nilai
                $bobot = null;
                foreach ($bobotArr as $b) {
                    if ($value >= $b['nilai_awal'] && $value <= $b['nilai_akhir']) {
                        $bobot = $b['nilai_bobot'];
                        break;
                    }
                }
                // Jika tidak ada bobot yang ditemukan, set bobot menjadi 0
                if ($bobot == null) {
                    $bobot = 0;
                }
                $konversi[$key] = $bobot;
            }
            // Menambahkan hasil konversi ke dalam array
            $konversiNilai[] = [
                'nama' => $nilai->nama,
                'ipa' => $konversi['ipa'],
                'ips' => $konversi['ips'],
                'matematika' => $konversi['matematika'],
                'bahasa_indonesia' => $konversi['bahasa_indonesia'],
                'bahasa_inggris' => $konversi['bahasa_inggris']
            ];
        }
        // Return hasil konversi
        return $konversiNilai;
    }

    // Normalisasi Min dan Max
    // public function normalisasi($konversiNilai)
    // {
    //     // menentukan nilai maksimum dan minimum dari masing-masing kriteria
    //     $max = array(
    //         'ipa' => 0,
    //         'ips' => 0,
    //         'matematika' => 0,
    //         'bahasa_indonesia' => 0,
    //         'bahasa_inggris' => 0
    //     );
    //     $min = array(
    //         'ipa' => 100,
    //         'ips' => 100,
    //         'matematika' => 100,
    //         'bahasa_indonesia' => 100,
    //         'bahasa_inggris' => 100
    //     );

    //     foreach ($konversiNilai as $konversi) {
    //         foreach ($konversi as $kriteria => $nilai) {
    //             if ($kriteria != 'nama') {
    //                 if ($nilai > $max[$kriteria]) {
    //                     $max[$kriteria] = $nilai;
    //                 }
    //                 if ($nilai < $min[$kriteria]) {
    //                     $min[$kriteria] = $nilai;
    //                 }
    //             }
    //         }
    //     }

    //     // melakukan perhitungan normalisasi
    //     $normalisasi = array();
    //     foreach ($konversiNilai as $konversi) {
    //         $normalisasiSiswa = array(
    //             'nama' => $konversi['nama']
    //         );

    //         foreach ($max as $kriteria => $nilaiMax) {
    //             $nilai = $konversi[$kriteria];
    //             $normalisasiSiswa[$kriteria] = ($nilai - $min[$kriteria]) / ($max[$kriteria] - $min[$kriteria]);
    //         }

    //         $normalisasi[] = $normalisasiSiswa;
    //     }

    //     return $normalisasi;
    // }

    // Normalisasi Max
    public function normalisasi()
    {
        $konversiNilai = $this->konversiNilai();
        // menentukan nilai maksimum dari masing-masing kriteria
        $max = array(
            'ipa' => 0,
            'ips' => 0,
            'matematika' => 0,
            'bahasa_indonesia' => 0,
            'bahasa_inggris' => 0
        );

        foreach ($konversiNilai as $konversi) {
            foreach ($konversi as $kriteria => $nilai) {
                if ($kriteria != 'nama') {
                    if ($nilai > $max[$kriteria]) {
                        $max[$kriteria] = $nilai;
                    }
                }
            }
        }

        // melakukan perhitungan normalisasi
        $normalisasi = array();
        foreach ($konversiNilai as $konversi) {
            $normalisasiSiswa = array(
                'nama' => $konversi['nama']
            );

            foreach ($max as $kriteria => $nilaiMax) {
                $nilai = $konversi[$kriteria];
                $normalisasiSiswa[$kriteria] = $nilai / $nilaiMax;
            }

            $normalisasi[] = $normalisasiSiswa;
        }

        return $normalisasi;
    }

    public function hitungNilaiAkhir($kode_jurusan)
    {
        // Pengambilan bobot kriteria dari database menggunakan Eloquent
        $subkriteria = sawSubKriteria::select('bobot')
            ->join('saw_kriteria', 'saw_kriteria.id', '=', 'saw_subkriteria.sawkriteria_id')
            ->where('saw_kriteria.kode_jurusan', $kode_jurusan)
            ->get();

        // Konversi bobot menjadi array asosiatif
        $bobotArr = array();
        foreach ($subkriteria as $key => $row) {
            $bobotArr[$key] = $row->bobot;
        }

        // Melakukan perhitungan nilai akhir
        $nilaiAkhir = array();
        foreach ($this->normalisasi() as $normalisasi) {
            $nilai = 0;
            $i = 0; // variabel index bobotArr
            foreach ($normalisasi as $kriteria => $nilaiNormalisasi) {
                if ($kriteria != 'nama') {
                    $nilai += $nilaiNormalisasi * $bobotArr[$i];
                    $i++; // tambahkan index setiap kali melakukan perhitungan
                }
            }
            $nilaiAkhir[] = array(
                'nama' => $normalisasi['nama'],
                'nilai' => $nilai
            );
        }

        return $nilaiAkhir;
    }

    public function rekomendasi()
    {
        // Memanggil function hitungCoreSecondaryFactor
        $hasil = [
            'IPA' => $this->hitungNilaiAkhir('IPA'),
            'IPS' => $this->hitungNilaiAkhir('IPS')
        ];

        // Membuat array untuk menyimpan hasil perbandingan total factor siswa
        $rekomendasi = [
            'IPA' => [],
            'IPS' => []
        ];

        // Melakukan perbandingan total factor siswa pada masing-masing jurusan
        foreach ($hasil['IPA'] as $key => $hsl) {
            $totalIPA = $hsl['nilai'];
            $totalIPS = $hasil['IPS'][$key]['nilai'];

            // Membandingkan total factor siswa pada jurusan IPA dan IPS
            if ($totalIPA > $totalIPS) {
                // Jika total factor siswa lebih besar pada jurusan IPA
                $rekomendasi['IPA'][] = $hsl['nama'];
            } elseif ($totalIPA < $totalIPS) {
                // Jika total factor siswa lebih besar pada jurusan IPS
                $rekomendasi['IPS'][] = $hsl['nama'];
            } else {
                // Jika total factor siswa sama besar pada kedua jurusan
                $rekomendasi['IPA'][] = $hsl['nama'];
                $rekomendasi['IPS'][] = $hsl['nama'];
            }
        }
        return $rekomendasi;
    }
}
