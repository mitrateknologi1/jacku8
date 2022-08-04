<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
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
                'nama' => 'Alamat',
                'isi' => 'Jalan Soekarno Hatta Km. 9 Palu - Sulawesi Tengah',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'nama' => 'Email',
                'isi' => 'upspfatek@gmail.com',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'nama' => 'Telepon',
                'isi' => '+62 813 4467 1157',
                'created_at' => Carbon::now()
            ]
        ];

        DB::table('kontak')->insert($data);
    }
}
