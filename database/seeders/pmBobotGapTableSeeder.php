<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pmBobotGapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mendapatkan seluruh kriteria dari database
        $kriteria = DB::table('pm_kriteria')->get();

        // Mendapatkan seluruh subkriteria dari database
        $subkriteria = DB::table('pm_subkriteria')->get();

        // Menentukan bobot nilai dan keterangan berdasarkan selisih
        $bobotGap = [
            ['selisih' => 0, 'bobot' => 5, 'keterangan' => 'Tidak ada selisih'],
            ['selisih' => 1, 'bobot' => 4.5, 'keterangan' => 'Kompetensi individu kelebihan 1 tingkat'],
            ['selisih' => -1, 'bobot' => 4, 'keterangan' => 'Kompetensi individu kekurangan 1 tingkat'],
            ['selisih' => 2, 'bobot' => 3.5, 'keterangan' => 'Kompetensi individu kelebihan 2 tingkat'],
            ['selisih' => -2, 'bobot' => 3, 'keterangan' => 'Kompetensi individu kekurangan 2 tingkat'],
            ['selisih' => 3, 'bobot' => 2.5, 'keterangan' => 'Kompetensi individu kelebihan 3 tingkat'],
            ['selisih' => -3, 'bobot' => 2, 'keterangan' => 'Kompetensi individu kekurangan 3 tingkat'],
            ['selisih' => 4, 'bobot' => 1.5, 'keterangan' => 'Kompetensi individu kelebihan 4 tingkat'],
            ['selisih' => -4, 'bobot' => 1, 'keterangan' => 'Kompetensi individu kekurangan 4 tingkat'],
        ];

        // Melakukan seeding untuk setiap kriteria dan subkriteria
        foreach ($kriteria as $k) {
            foreach ($subkriteria as $sk) {
                if ($sk->pmkriteria_id == $k->id) {
                    foreach ($bobotGap as $bg) {
                        DB::table('pm_bobotgap')->insert([
                            'pmkriteria_id' => $k->id,
                            'pmsubkriteria_id' => $sk->id,
                            'selisih' => $bg['selisih'],
                            'bobot' => $bg['bobot'],
                            'keterangan' => $bg['keterangan'],
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }
            }
        }
    }
}
