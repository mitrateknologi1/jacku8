<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
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
                'nama' => 'S1 Teknik Sipil',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'nama' => 'D3 Teknik Sipil',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'nama' => 'D3 Teknik Mesin',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'nama' => 'D3 Teknik Listrik',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'nama' => 'S1 Arsitektur',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'nama' => 'S1 Teknik Mesin',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'nama' => 'S1 Teknik Elektro',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'nama' => 'S1 Teknik Informatika',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'nama' => 'S1 Teknik Geologi',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'nama' => 'S2 Teknik Sipil',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'nama' => 'S1 Teknik Lingkungan',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'nama' => 'S1 Sistem Informasi',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'nama' => 'Program Profesi Insinyur',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'nama' => 'S1 Perencanaan Wilayah dan Kota',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('prodi')->insert($data);
    }
}
