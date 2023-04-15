<?php

namespace Database\Seeders;

use App\Models\sawKriteria;
use Illuminate\Database\Seeder;

class sawKriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sawKriteria::create([
            'kode_jurusan' => 'IPA',
            'nama_jurusan' => 'Ilmu Pengetahuan Alam',
        ],);

        sawKriteria::create([
            'kode_jurusan' => 'IPS',
            'nama_jurusan' => 'Ilmu Pengetahuan Sosial',
        ]);
    }
}
