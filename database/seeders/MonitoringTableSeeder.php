<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MonitoringTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('monitoring')->delete();
        
        \DB::table('monitoring')->insert(array (
            0 => 
            array (
                'id' => 1,
                'prodi_id' => 2,
                'nama' => 'Monitoring 1',
                'jenis_dokumen' => 'Publik',
                'file' => '1659407087.pdf',
                'tanggal_upload' => '2022-01-01',
                'created_at' => '2022-08-02 02:24:47',
                'updated_at' => '2022-08-02 02:24:47',
            ),
            1 => 
            array (
                'id' => 2,
                'prodi_id' => 1,
                'nama' => 'Monitoring 2',
                'jenis_dokumen' => 'Privat',
                'file' => '1659407097.pdf',
                'tanggal_upload' => '2022-02-02',
                'created_at' => '2022-08-02 02:24:57',
                'updated_at' => '2022-08-02 02:24:57',
            ),
        ));
        
        
    }
}