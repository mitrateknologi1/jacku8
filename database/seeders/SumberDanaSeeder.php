<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SumberDanaSeeder extends Seeder
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
                'nama' => 'Sumber Dana 1',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'nama' => 'Sumber Dana 2',
                'created_at' => Carbon::now()
            ],
        ];

        DB::table('sumber_dana')->insert($data);
    }
}
