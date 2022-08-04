<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArsipJurnalTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('arsip_jurnal')->delete();
        
        \DB::table('arsip_jurnal')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Foto Kegiatan Diseminasi IRSPSD Section C',
                'jenis_dokumen' => 'Privat',
                'file' => '13b68ab0d39ed880ce96ba11b562517c.rar',
                'tanggal_upload' => '2021-04-27',
                'created_at' => '2021-08-26 06:49:11',
                'updated_at' => '2021-08-26 06:49:11',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'PENANDATANGANAN KERJASAMA DENGAN ASOSIASI DAN KEMENTRIAN PUPR',
                'jenis_dokumen' => 'Publik',
                'file' => '28f10002e06cfbf494a8fbc52f65d995.jpeg',
                'tanggal_upload' => '2021-02-22',
                'created_at' => '2022-02-22 13:17:01',
                'updated_at' => '2022-02-22 13:17:01',
            ),
            2 => 
            array (
                'id' => 3,
            'nama' => 'INTERNATIONAL CONFERENCE ON SPATIAL PLANNING AND SUSTAINABLE DEVELOPMEN (SPSD 2021)
Dalam Rangka Partisipasi dan Bagian dari Seminar Internasional yang dilaksanakan pada 25-27 November 2021 . Kerja sama dengan Kanaza Wa University di ikuti oleh 174 Peserta dari berbagai Perguruan Tinggi dalam dan Luar Negeri.',
                'jenis_dokumen' => 'Publik',
                'file' => '4bc610559a4da0417f576550ec93fe00.jpeg',
                'tanggal_upload' => '2021-02-22',
                'created_at' => '2022-02-22 13:24:57',
                'updated_at' => '2022-02-22 13:24:57',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'SKEMA SERTIFIKASI PROFESI.
KERJASAMA DENGAN LSP UNIVERSITAS MUHAMMADIYAH MALANG.
Skema yang di Hasilkan akan diusulkan untuk di gabung seiring Penerbitan SK LSP Universitas (18 Skema).',
                'jenis_dokumen' => 'Publik',
                'file' => 'a387abb3405390634f8940dc5c54cdfa.jpeg',
                'tanggal_upload' => '2021-02-22',
                'created_at' => '2022-02-22 13:38:36',
                'updated_at' => '2022-02-22 13:38:36',
            ),
        ));
        
        
    }
}