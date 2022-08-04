<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkemaPenelitianSeeder extends Seeder
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
                'nama' => 'Skema Penelitian 1',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'nama' => 'Skema Penelitian 2',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('skema_penelitian')->insert($data);
    }
}
