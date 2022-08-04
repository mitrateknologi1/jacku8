<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RpsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rps')->delete();
        
        \DB::table('rps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'RPS 59 Matakuliah Teknik Informatika',
                'prodi_id' => 8,
                'tahun' => '2021',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '9df2d81e27d0ca4880668429e1abf34f.rar',
                'created_at' => '2022-08-03 12:30:02',
                'updated_at' => '2022-08-03 12:30:02',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'RPS 24  Matakuliah  Sistem Informasi',
                'prodi_id' => 12,
                'tahun' => '2021',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '9dfc3e4b3c0345c31ff5c62e53fa6c90.zip',
                'created_at' => '2022-08-03 12:30:02',
                'updated_at' => '2022-08-03 12:30:02',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'RPS 20  Matakuliah  Teknik Geologi',
                'prodi_id' => 9,
                'tahun' => '2021',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'd7f2986b4b312624656f21a9ea9ce6d5.rar',
                'created_at' => '2022-08-03 12:30:02',
                'updated_at' => '2022-08-03 12:30:02',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Workshop Penyusunan RPS berbasis Chase Method and Project Base yang di ikuti oleh Perwakilan dari Semua Prodi dan Jurusan di Lingkungan Teknik.',
                'prodi_id' => 1,
                'tahun' => '2021',
                'tanggal_upload' => '2021-02-18',
                'jenis_dokumen' => 'Publik',
                'file' => '56a87c64a3254e490f6ab53844bcee65.jpeg',
                'created_at' => '2022-08-03 12:30:02',
                'updated_at' => '2022-08-03 12:30:02',
            ),
        ));
        
        
    }
}