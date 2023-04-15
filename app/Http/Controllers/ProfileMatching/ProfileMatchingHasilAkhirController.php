<?php

namespace App\Http\Controllers\ProfileMatching;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfileMatchingHasilAkhirController extends Controller
{
    public function index()
    {
        // Memanggil function konversiNilai
        $konversiNilai = $this->konversiNilai();
        // Memanggil function PemetaanNilai
        $pemetaanNilai = [
            'IPA' => $this->pemetaanNilai('IPA'),
            'IPS' => $this->pemetaanNilai('IPS')
        ];
        // Memanggil function hitungBobotGap
        $bobotGap = [
            'IPA' => $this->hitungBobotGap('IPA'),
            'IPS' => $this->hitungBobotGap('IPS')
        ];

        // Memanggil function hitungCoreSecondaryFactor
        $csFactor = [
            'IPA' => $this->hitungCoreSecondaryFactor('IPA'),
            'IPS' => $this->hitungCoreSecondaryFactor('IPS')
        ];
        $rekom = $this->rekomendasi();
        // Menampilkan hasil
        return view('profilematching.hasil.index', [
            "title" => "Proses Profile Matching",
            'konversiNilai' => $konversiNilai,
            'pemetaanNilai' => $pemetaanNilai,
            'bobotGap' => $bobotGap,
            'csFactor' => $csFactor,
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

    public function pemetaanNilai($kode_jurusan)
    {
        // Mengambil data konversi nilai siswa dari function KonversiNilai()
        $konversiNilai = $this->KonversiNilai();

        // Mengambil data subkriteria dan kriteria dari tabel subkriteria dan kriteria
        $subkriteria = DB::table('pm_subkriteria')
            ->join('pm_kriteria', 'pm_subkriteria.pmkriteria_id', '=', 'pm_kriteria.id')
            ->select('pm_subkriteria.id', 'nama_kriteria', 'bobot', 'jenis_kriteria', 'pm_kriteria.kode_jurusan')
            ->where('pm_kriteria.kode_jurusan', '=', $kode_jurusan)
            ->get();


        // Inisialisasi array pemetaan nilai
        $pemetaanNilai = [];

        // Looping nilai siswa dari hasil konversi nilai siswa pada function KonversiNilai()
        foreach ($konversiNilai as $nilaiSiswa) {
            // Inisialisasi array pemetaan nilai siswa
            $pemetaanNilaiSiswa = [
                'nama' => $nilaiSiswa['nama'],
                'pemetaan' => []
            ];
            // Looping subkriteria dari data subkriteria yang sudah diambil sebelumnya
            foreach ($subkriteria as $kr) {
                // Hitung nilai gap berdasarkan bobot subkriteria
                $gap = null;
                $konversi = $nilaiSiswa[$kr->nama_kriteria]; // ambil nilai konversi sesuai subkriteria yang di-looping
                $bobot = $kr->bobot;

                $gap = $konversi - $bobot;

                // Kurangi nilai bobot pada nilai konversi
                $nilaiPemetaan = $gap;
                $pemetaanNilaiSiswa['pemetaan'][$kr->nama_kriteria] = $nilaiPemetaan;
            }
            // Simpan hasil pemetaan nilai siswa pada array pemetaan nilai
            $pemetaanNilai[] = $pemetaanNilaiSiswa;
        }
        return $pemetaanNilai;
    }

    public function hitungBobotGap($kode_jurusan)
    {
        // Mengambil data pemetaan nilai siswa dari function pemetaanNilai()
        $pemetaanNilai = $this->pemetaanNilai($kode_jurusan);

        // Mengambil data bobot gap dari tabel pm_bobotgap
        $bobotGap = DB::table('pm_bobotgap')
            ->join('pm_subkriteria', 'pm_bobotgap.pmsubkriteria_id', '=', 'pm_subkriteria.id')
            ->join('pm_kriteria', 'pm_subkriteria.pmkriteria_id', '=', 'pm_kriteria.id')
            ->select('pm_bobotgap.selisih', 'pm_bobotgap.bobot', 'pm_subkriteria.nama_kriteria')
            ->where('pm_kriteria.kode_jurusan', '=', $kode_jurusan)
            ->get();


        // Inisialisasi array bobot gap
        $bobotGapArray = [];

        // Looping pemetaan nilai siswa
        foreach ($pemetaanNilai as $nilaiSiswa) {
            // Inisialisasi array bobot gap siswa
            $bobotGapSiswa = [
                'nama' => $nilaiSiswa['nama'],
                'bobot_gap' => []
            ];

            // Looping bobot gap dari tabel pm_bobotgap
            foreach ($bobotGap as $bg) {
                // Bandingkan nilai pada pemetaan nilai dengan nilai selesih pada bobot gap
                if ($nilaiSiswa['pemetaan'][$bg->nama_kriteria] == $bg->selisih) {
                    $bobotGapSiswa['bobot_gap'][$bg->nama_kriteria] = $bg->bobot;
                }
            }

            // Simpan hasil bobot gap siswa pada array bobot gap
            $bobotGapArray[] = $bobotGapSiswa;
        }

        return $bobotGapArray;
    }

    public function hitungCoreSecondaryFactor($kode_jurusan)
    {
        // Mengambil data pm_subkriteria dan jenis kriterianya
        $subKriteria = DB::table('pm_subkriteria')
            ->join('pm_kriteria', 'pm_subkriteria.pmkriteria_id', '=', 'pm_kriteria.id')
            ->select('pm_subkriteria.nama_kriteria', 'pm_subkriteria.jenis_kriteria')
            ->where('pm_kriteria.kode_jurusan', '=', $kode_jurusan)
            ->get();

        // Inisialisasi array Core Factor dan Secondary Factor
        $coreFactorArray = [];
        $secondaryFactorArray = [];

        // Looping pm_subkriteria untuk memisahkan Core Factor dan Secondary Factor
        foreach ($subKriteria as $sk) {
            if ($sk->jenis_kriteria == 'Core Factor') {
                $coreFactorArray[] = $sk->nama_kriteria;
            } else {
                $secondaryFactorArray[] = $sk->nama_kriteria;
            }
        }

        // Mengambil data bobot gap dari function hitungBobotGap()
        $bobotGapArray = $this->hitungBobotGap($kode_jurusan);

        // Inisialisasi array hasil Core Factor dan Secondary Factor
        $coreSecondaryArray = [];

        // Looping bobot gap untuk menghitung Core Factor dan Secondary Factor setiap siswa
        foreach ($bobotGapArray as $bg) {
            $namaSiswa = $bg['nama'];
            $coreFactorTotal = 0;
            $secondaryFactorTotal = 0;
            $coreFactorCount = count($coreFactorArray);
            $secondaryFactorCount = count($secondaryFactorArray);

            foreach ($bg['bobot_gap'] as $key => $bgValue) {
                $namaKriteria = $key;
                $bobotGapValue = $bgValue;

                if (in_array($namaKriteria, $coreFactorArray)) {
                    $coreFactorTotal += $bobotGapValue;
                } else {
                    $secondaryFactorTotal += $bobotGapValue;
                }
            }

            // Menghitung rata-rata Core Factor dan Secondary Factor
            $coreFactor = $coreFactorTotal / $coreFactorCount;
            $secondaryFactor = $secondaryFactorTotal / $secondaryFactorCount;
            $totalFactor = $coreFactor + $secondaryFactor;
            // Menyimpan hasil Core Factor dan Secondary Factor pada array
            $coreSecondaryArray[] = [
                'nama' => $namaSiswa,
                'core_factor' => round($coreFactor, 2),
                'secondary_factor' => round($secondaryFactor, 2),
                'total_factor' => round($totalFactor, 2)
            ];
        }

        return $coreSecondaryArray;
    }

    public function rekomendasi()
    {
        // Memanggil function hitungCoreSecondaryFactor
        $csFactor = [
            'IPA' => $this->hitungCoreSecondaryFactor('IPA'),
            'IPS' => $this->hitungCoreSecondaryFactor('IPS')
        ];

        // Membuat array untuk menyimpan hasil perbandingan total factor siswa
        $rekomendasi = [
            'IPA' => [],
            'IPS' => []
        ];

        // Melakukan perbandingan total factor siswa pada masing-masing jurusan
        foreach ($csFactor['IPA'] as $key => $csData) {
            $totalFactorIPA = $csData['total_factor'];
            $totalFactorIPS = $csFactor['IPS'][$key]['total_factor'];

            // Membandingkan total factor siswa pada jurusan IPA dan IPS
            if ($totalFactorIPA > $totalFactorIPS) {
                // Jika total factor siswa lebih besar pada jurusan IPA
                $rekomendasi['IPA'][] = $csData['nama'];
            } elseif ($totalFactorIPA < $totalFactorIPS) {
                // Jika total factor siswa lebih besar pada jurusan IPS
                $rekomendasi['IPS'][] = $csData['nama'];
            } else {
                // Jika total factor siswa sama besar pada kedua jurusan
                $rekomendasi['IPA'][] = $csData['nama'];
                $rekomendasi['IPS'][] = $csData['nama'];
            }
        }
        return $rekomendasi;
    }
}
