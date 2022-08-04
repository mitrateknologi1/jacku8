<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArsipPenelitianTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('arsip_penelitian')->delete();
        
        \DB::table('arsip_penelitian')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'PANDUAN 
PENELITIAN
Tahun 2022
UNIVERSITAS TADULAKO
Edisi ke 3',
                'jenis_dokumen' => 'Publik',
                'file' => '0eec9dc42f5f66330c7c3e38d776c210.pdf',
                'tanggal_upload' => '2022-02-09',
                'created_at' => '2022-02-09 18:09:41',
                'updated_at' => '2022-02-09 18:09:41',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'PANDUAN 
PENGABDIAN
KEPADA MASYARAKAT
Tahun 2022
UNIVERSITAS TADULAKO
Edisi ke 3',
                'jenis_dokumen' => 'Publik',
                'file' => 'b998c0bb39365c5c41c30db0829ed92f.pdf',
                'tanggal_upload' => '2022-02-09',
                'created_at' => '2022-02-09 18:15:43',
                'updated_at' => '2022-02-09 18:15:43',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'PENYAMPAIAN PEMASUKAN PROPOSAL PENELITIAN MANDIRI DIPA FAKULTAS TA 2022',
                'jenis_dokumen' => 'Publik',
                'file' => '7924a39ffc46d729fdb3f9638f794921.pdf',
                'tanggal_upload' => '2022-02-10',
                'created_at' => '2022-02-10 09:42:42',
                'updated_at' => '2022-02-10 09:42:42',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Monitoring dan Evaluasi Penelitian dan Pengabdian',
                'jenis_dokumen' => 'Publik',
                'file' => 'c893efff533d2f2d947e2e7aafb468e9.jpeg',
                'tanggal_upload' => '2022-02-18',
                'created_at' => '2022-02-18 15:04:21',
                'updated_at' => '2022-02-18 15:04:21',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'SURAT KEPUTUSAN REKTOR TENTANG DIPA TEKNIK
PENETAPAN PEMENAGAN PROPOSAL PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT DIPA UNIVERSITAS, FAKULTAS, PASCASARJANA DAN PSDKU DI LINGKUGAN UNIVERSITAS TADULAKO TAHUN ANGGARAN 2021',
                'jenis_dokumen' => 'Publik',
                'file' => '1d1be9d130b898b262b73e037169e034.pdf',
                'tanggal_upload' => '2022-04-18',
                'created_at' => '2022-04-18 09:22:32',
                'updated_at' => '2022-04-18 09:22:32',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'SURAT KEPUTUSAN REKTOR UNIVERSITAS TADULAKO
PENETAPAN JUDUL PROPOSAL DAN PENERIMA DANA PENELITIAN FAKULTAS, PASCASARJANA, PSDKU TOJO UNA UNA DAN UNIVERSITAS PADA LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT UNIVERSITAS TADULAKO TAHUN 2020',
                'jenis_dokumen' => 'Publik',
                'file' => 'a952a0c989c98fbe0e3d4e0eb5d2f80f.pdf',
                'tanggal_upload' => '2022-04-18',
                'created_at' => '2022-04-18 09:29:47',
                'updated_at' => '2022-04-18 09:29:47',
            ),
        ));
        
        
    }
}