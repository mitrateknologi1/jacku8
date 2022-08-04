<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TampilanBerandaSeeder extends Seeder
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
                'foto' => 'hero-1.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'foto' => 'hero-2.jpg',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'foto' => 'hero-3.jpg',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('tampilan_beranda')->insert($data);
    }
}
