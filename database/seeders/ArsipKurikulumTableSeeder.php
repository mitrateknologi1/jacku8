<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArsipKurikulumTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('arsip_kurikulum')->delete();
        
        \DB::table('arsip_kurikulum')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'UPDATING WEB UPSP',
                'jenis_dokumen' => 'Publik',
                'file' => '6bf03803f621b0820e9c6a0dfaba7f37.jpeg',
                'tanggal_upload' => '2021-02-18',
                'created_at' => '2022-04-11 02:07:24',
                'updated_at' => '2022-02-18 15:11:18',
            ),
        ));
        
        
    }
}