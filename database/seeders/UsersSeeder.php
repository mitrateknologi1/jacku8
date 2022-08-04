<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$jDSoFmVE15w0P7asttusKeZWPq5DlfOT6Pbash5TTHQT6xQGoBCy6',
                'role' => 'admin',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'username' => 'kurikulum',
                'password' => '$2y$10$jDSoFmVE15w0P7asttusKeZWPq5DlfOT6Pbash5TTHQT6xQGoBCy6',
                'role' => 'kurikulum',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'username' => 'penelitian',
                'password' => '$2y$10$jDSoFmVE15w0P7asttusKeZWPq5DlfOT6Pbash5TTHQT6xQGoBCy6',
                'role' => 'penelitian',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'username' => 'kerjasama',
                'password' => '$2y$10$jDSoFmVE15w0P7asttusKeZWPq5DlfOT6Pbash5TTHQT6xQGoBCy6',
                'role' => 'kerja_sama',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'username' => 'dosen',
                'password' => '$2y$10$jDSoFmVE15w0P7asttusKeZWPq5DlfOT6Pbash5TTHQT6xQGoBCy6',
                'role' => 'dosen',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('users')->insert($data);
    }
}
