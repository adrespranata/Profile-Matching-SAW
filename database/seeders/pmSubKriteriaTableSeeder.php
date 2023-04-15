<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pmSubKriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pm_subkriteria')->insert([
            ['pmkriteria_id' => 1, 'nama_kriteria' => 'ipa', 'bobot' => 3, 'jenis_kriteria' => 'Core Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 1, 'nama_kriteria' => 'matematika', 'bobot' => 3, 'jenis_kriteria' => 'Core Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 1, 'nama_kriteria' => 'ips', 'bobot' => 1, 'jenis_kriteria' => 'Secondary Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 1, 'nama_kriteria' => 'bahasa_indonesia', 'bobot' => 2, 'jenis_kriteria' => 'Secondary Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 1, 'nama_kriteria' => 'bahasa_inggris', 'bobot' => 1, 'jenis_kriteria' => 'Secondary Factor', 'created_at' => now(), 'updated_at' => now()],

            ['pmkriteria_id' => 2, 'nama_kriteria' => 'ipa', 'bobot' => 1, 'jenis_kriteria' => 'Secondary Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 2, 'nama_kriteria' => 'matematika', 'bobot' => 1, 'jenis_kriteria' => 'Secondary Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 2, 'nama_kriteria' => 'ips', 'bobot' => 3, 'jenis_kriteria' => 'Core Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 2, 'nama_kriteria' => 'bahasa_indonesia', 'bobot' => 2, 'jenis_kriteria' => 'Core Factor', 'created_at' => now(), 'updated_at' => now()],
            ['pmkriteria_id' => 2, 'nama_kriteria' => 'bahasa_inggris', 'bobot' => 3, 'jenis_kriteria' => 'Core Factor', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
