<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sawSubKriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('saw_subkriteria')->insert([
            ['sawkriteria_id' => 1, 'nama_kriteria' => 'ipa', 'bobot' => 0.3, 'jenis_kriteria' => 'Benefit',  'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 1, 'nama_kriteria' => 'matematika', 'bobot' => 0.3, 'jenis_kriteria' => 'Benefit',  'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 1, 'nama_kriteria' => 'ips', 'bobot' => 0.1, 'jenis_kriteria' => 'Cost', 'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 1, 'nama_kriteria' => 'bahasa_indonesia', 'bobot' => 0.2, 'jenis_kriteria' => 'Cost', 'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 1, 'nama_kriteria' => 'bahasa_inggris', 'bobot' => 0.1, 'jenis_kriteria' => 'Cost', 'created_at' => now(), 'updated_at' => now()],

            ['sawkriteria_id' => 2, 'nama_kriteria' => 'ipa', 'bobot' => 0.1, 'jenis_kriteria' => 'Cost', 'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 2, 'nama_kriteria' => 'matematika', 'bobot' => 0.1, 'jenis_kriteria' => 'Cost', 'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 2, 'nama_kriteria' => 'ips', 'bobot' => 0.3, 'jenis_kriteria' => 'Benefit',  'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 2, 'nama_kriteria' => 'bahasa_indonesia', 'bobot' => 0.2, 'jenis_kriteria' => 'Benefit',  'created_at' => now(), 'updated_at' => now()],
            ['sawkriteria_id' => 2, 'nama_kriteria' => 'bahasa_inggris', 'bobot' => 0.3, 'jenis_kriteria' => 'Benefit', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
