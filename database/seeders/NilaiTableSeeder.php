<?php

namespace Database\Seeders;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class NilaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dewi
        $dewi = Siswa::where('nama', 'Dewi')->first();

        Nilai::create([
            'siswa_id' => $dewi->id,
            'ipa' => 70,
            'ips' => 78,
            'matematika' => 75,
            'bahasa_indonesia' => 75,
            'bahasa_inggris' => 76
        ]);

        // Ruli
        $ruli = Siswa::where('nama', 'Ruli')->first();

        Nilai::create([
            'siswa_id' => $ruli->id,
            'ipa' => 73,
            'ips' => 76,
            'matematika' => 65,
            'bahasa_indonesia' => 80,
            'bahasa_inggris' => 70
        ]);

        // Ema
        $ema = Siswa::where('nama', 'Ema')->first();

        Nilai::create([
            'siswa_id' => $ema->id,
            'ipa' => 90,
            'ips' => 85,
            'matematika' => 85,
            'bahasa_indonesia' => 90,
            'bahasa_inggris' => 80
        ]);
    }
}
