<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkemaPengabdianSeeder extends Seeder
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
                'nama' => 'Skema Pengabdian 1',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'nama' => 'Skema Pengabdian 2',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('skema_pengabdian')->insert($data);
    }
}
