<?php

namespace Database\Seeders;

use App\Models\sawKriteria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            BobotTableSeeder::class,
            SiswaTableSeeder::class,
            NilaiTableSeeder::class,
            pmKriteriaTableSeeder::class,
            pmSubKriteriaTableSeeder::class,
            pmBobotGapTableSeeder::class,
            sawKriteriaTableSeeder::class,
            sawSubKriteriaTableSeeder::class,
        ]);
    }
}
