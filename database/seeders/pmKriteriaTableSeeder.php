<?php

namespace Database\Seeders;

use App\Models\pmKriteria;
use Illuminate\Database\Seeder;

class pmKriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pmKriteria::create([
            'kode_jurusan' => 'IPA',
            'nama_jurusan' => 'Ilmu Pengetahuan Alam',
        ],);

        pmKriteria::create([
            'kode_jurusan' => 'IPS',
            'nama_jurusan' => 'Ilmu Pengetahuan Sosial',
        ]);
    }
}
