<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModulTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modul')->delete();
        
        \DB::table('modul')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Modul AutoCAD',
                'prodi_id' => 6,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-10',
                'jenis_dokumen' => 'Publik',
                'file' => '84eef6fca7a4bae6ab04523322c2cf8b.pdf',
                'created_at' => '2022-08-03 07:26:15',
                'updated_at' => '2022-08-03 07:26:15',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Modul Keamanan Komputer',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-10',
                'jenis_dokumen' => 'Publik',
                'file' => 'a6c83047b97f4ca64ce3282996e9857b.pdf',
                'created_at' => '2022-08-03 07:26:15',
                'updated_at' => '2022-08-03 07:26:15',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Modul Perancangan dan Analisis Algoritma',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-09',
                'jenis_dokumen' => 'Publik',
                'file' => '342b1e95e1d44c8f3b05e92f3fa4455a.docx',
                'created_at' => '2022-08-03 07:26:15',
                'updated_at' => '2022-08-03 07:26:15',
            ),
        ));
        
        
    }
}