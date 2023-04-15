<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'nisn' => '1111111111',
            'nama' => 'Dewi',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2004-05-01',
            'no_telepon' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 123'
        ]);

        Siswa::create([
            'nisn' => '2222222222',
            'nama' => 'Ruli',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2004-06-15',
            'no_telepon' => '081234567891',
            'alamat' => 'Jl. Sudirman No. 456'
        ]);

        Siswa::create([
            'nisn' => '3333333333',
            'nama' => 'Ema',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2004-08-05',
            'no_telepon' => '081234567892',
            'alamat' => 'Jl. Ahmad Yani No. 789'
        ]);
    }
}
