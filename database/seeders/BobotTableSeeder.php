<?php

namespace Database\Seeders;

use App\Models\Bobot;
use Illuminate\Database\Seeder;

class BobotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bobot::create([
            'nilai_awal' => 91,
            'nilai_akhir' => 100,
            'nilai_bobot' => 5
        ]);
        Bobot::create([
            'nilai_awal' => 81,
            'nilai_akhir' => 90,
            'nilai_bobot' => 4
        ]);
        Bobot::create([
            'nilai_awal' => 71,
            'nilai_akhir' => 80,
            'nilai_bobot' => 3
        ]);
        Bobot::create([
            'nilai_awal' => 61,
            'nilai_akhir' => 70,
            'nilai_bobot' => 2
        ]);
        Bobot::create([
            'nilai_awal' => 0,
            'nilai_akhir' => 60,
            'nilai_bobot' => 1
        ]);
    }
}
