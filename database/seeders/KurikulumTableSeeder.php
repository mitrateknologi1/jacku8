<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KurikulumTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kurikulum')->delete();
        
        \DB::table('kurikulum')->insert(array (
            0 => 
            array (
                'id' => 1,
                'prodi_id' => 13,
                'nama' => 'Kurikulum KKNI Program Profesi Insinyur ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => 'c31e80c7765377e190b1aba65e479c6b.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            1 => 
            array (
                'id' => 2,
                'prodi_id' => 12,
                'nama' => 'Kurikulum KKNI S1 Sistem Informasi',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => 'afd2f1cefddf4e773fefe393814796ff.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            2 => 
            array (
                'id' => 3,
                'prodi_id' => 11,
                'nama' => 'Kurikulum KKNI S1 Teknik Lingkungan ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => '7eb44a351c52487d57371c7a962cc568.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            3 => 
            array (
                'id' => 4,
                'prodi_id' => 10,
                'nama' => 'Kurikulum KKNI S2 Teknik Sipil ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => '62c0356840da89f9a9456723efa0e6fc.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            4 => 
            array (
                'id' => 5,
                'prodi_id' => 14,
                'nama' => 'Kurikulum KKNI S1 Perencanaan Wilayah dan Kota',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => '74ca2aef23329329d12191d003188042.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            5 => 
            array (
                'id' => 6,
                'prodi_id' => 9,
                'nama' => 'Kurikulum KKNI S1 Teknik Geologi ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => '7140da6a39b569b7ecc35c89832d2bc1.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            6 => 
            array (
                'id' => 7,
                'prodi_id' => 8,
                'nama' => 'Kurikulum KKNI S1 Teknik Informatika ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => '4789ebbe4b9ae99e3177fbe6d11c958b.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            7 => 
            array (
                'id' => 8,
                'prodi_id' => 7,
                'nama' => 'Kurikulum KKNI SI Teknik Elektro',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => '6dfe8d787be56b9505efe334f7adfc9e.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            8 => 
            array (
                'id' => 9,
                'prodi_id' => 6,
                'nama' => 'Kurikulum KKNI S1 Teknik Mesin',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => 'ce61e022937643b171ceab07a25b3911.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            9 => 
            array (
                'id' => 10,
                'prodi_id' => 5,
                'nama' => 'Kurikulum KKNI S1 Arsitektur ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => 'e741b7744bbd86e92f121ccb2e99ba53.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            10 => 
            array (
                'id' => 11,
                'prodi_id' => 4,
                'nama' => 'Kurikulum KKNI D3 Teknik Listrik ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => 'c1150814ecc6c001b145238b5235cc71.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            11 => 
            array (
                'id' => 12,
                'prodi_id' => 3,
                'nama' => 'Kurikulum KKNI D3 Teknik Mesin ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => 'e0956c9445af867aab447e2d8a00f103.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            12 => 
            array (
                'id' => 13,
                'prodi_id' => 1,
                'nama' => 'Kurikulum KKNI S1 Teknik Sipil ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => 'd632202910819c434eedd3c8c38a6569.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            13 => 
            array (
                'id' => 14,
                'prodi_id' => 2,
                'nama' => 'Kurikulum KKNI D3 Teknik Sipil   ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '91e8a2a13bc730b6d68ea2523fc4e58c.pdf',
                'tanggal_upload' => '2021-08-11',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            14 => 
            array (
                'id' => 15,
                'prodi_id' => 10,
            'nama' => 'SK Kurikulum S2 Sipil (KKNI)',
                'tahun' => '2020',
                'jenis_dokumen' => 'Publik',
                'file' => '0c8f9352e459ecef5beee23d05f2c2da.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            15 => 
            array (
                'id' => 16,
                'prodi_id' => 4,
                'nama' => 'SK Kurikulum D3 Teknik Listrik',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '3e3bc47ca8c646c7ff995043b9cc6569.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            16 => 
            array (
                'id' => 17,
                'prodi_id' => 5,
            'nama' => 'SK Kurikulum S1 Arsitektur (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '9e81c915f83d182b1dd3338ae27d2446.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            17 => 
            array (
                'id' => 18,
                'prodi_id' => 12,
            'nama' => 'SK Kurikulum S1 Sistem Informasi (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => 'cbdc64fc020546529f11cad155842e84.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            18 => 
            array (
                'id' => 19,
                'prodi_id' => 9,
            'nama' => 'SK Kurikulum S1 Teknik Geologi (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => 'ca7c84dc85c3389a7b19cad863b6267d.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            19 => 
            array (
                'id' => 20,
                'prodi_id' => 8,
            'nama' => 'SK Kurikulum S1 Teknik Informatika (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '0719dda2914e21ecaa61514659f0680d.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            20 => 
            array (
                'id' => 21,
                'prodi_id' => 11,
            'nama' => 'SK Kurikulum S1 Teknik Lingkungan (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '7c81da48bf4de45586243821ea26883c.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            21 => 
            array (
                'id' => 22,
                'prodi_id' => 6,
            'nama' => 'SK Kurikulum S1 Teknik Mesin (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '9cce5846eb32857bf474d07c3742c45e.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            22 => 
            array (
                'id' => 23,
                'prodi_id' => 14,
            'nama' => 'SK Kurikulum S1 PWK (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => 'b28c33588f64163a535b57ca565169bc.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            23 => 
            array (
                'id' => 24,
                'prodi_id' => 3,
            'nama' => 'SK Kurikulum D3 Teknik Mesin (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '5a4784bd871edd5f8803e7516d191f89.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            24 => 
            array (
                'id' => 25,
                'prodi_id' => 13,
            'nama' => 'SK Kurikulum Profesi Insinyur (KKNI)',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '94094a0c6bee5a748475cc9154d4ee57.pdf',
                'tanggal_upload' => '2021-12-01',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            25 => 
            array (
                'id' => 26,
                'prodi_id' => 1,
                'nama' => 'Dokumen Penyusunan Kurikulum Pendidikan Tinggi Program Studi S1 Teknik Sipil FATEK, UNIVERSITAS TADULAKO ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Privat',
                'file' => '51b6578f4545e4a2b6799c092a1c00a3.pdf',
                'tanggal_upload' => '2021-02-14',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            26 => 
            array (
                'id' => 27,
                'prodi_id' => 1,
                'nama' => 'Kurikulum MBKM ',
                'tahun' => '2022',
                'jenis_dokumen' => 'Privat',
                'file' => '261fca07c8d7caddc3b9b810f109bbb7.pdf',
                'tanggal_upload' => '2021-02-14',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            27 => 
            array (
                'id' => 28,
                'prodi_id' => 6,
                'nama' => 'Penyerahan SK Kurikulum Pada Rapat Senat Fakultas Teknik ',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '1e272d5fbe0950b643aa35c45bf072ee.jpeg',
                'tanggal_upload' => '2021-03-18',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            28 => 
            array (
                'id' => 29,
                'prodi_id' => 1,
                'nama' => 'Monev Kurikulum MBKM 3 Program Studi : Prodi S1 Teknik Sipil, S1 Elektro, S1 Teknik Informatika',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '7bb2899292ef0f5f9f747fd119d9d4c5.jpeg',
                'tanggal_upload' => '2021-04-18',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            29 => 
            array (
                'id' => 30,
                'prodi_id' => 1,
                'nama' => 'Monitoring dan evaluasi Kurikulum MBKM Fatek dengan Mengundang Perwakilan Prodi yang totalnya Sebanyak 30 Orang Pada Tanggal 05 Desember 2021',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => 'e5f0a7c6d8c6e6f5fcc185cb7a4bbb0b.jpeg',
                'tanggal_upload' => '2021-05-18',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            30 => 
            array (
                'id' => 31,
                'prodi_id' => 14,
                'nama' => 'Penyerahan Pengisian Instrumen Terbaik Monev Kurikulum MBKM Oleh Dr. Afadil ke PRODI S1 PWK',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '06bb2b1bd3bcdd27c5a88b6b218e6b8d.jpeg',
                'tanggal_upload' => '2021-06-18',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
            31 => 
            array (
                'id' => 32,
                'prodi_id' => 14,
                'nama' => 'Penyelesaian Kurikulum Berbasis KKNI oleh Prodi S1 PWK, Prodi D3 Mesin dan Prodi PPI dan Pengesahan SK Kurikulum Program Studi S1 Teknik Lingkungan Oleh Dekan Fakultas Teknik',
                'tahun' => '2021',
                'jenis_dokumen' => 'Publik',
                'file' => '8e3c8185d4e8eb662a70dc9ae5298e59.jpeg',
                'tanggal_upload' => '2021-07-18',
                'created_at' => '2022-08-03 07:14:33',
                'updated_at' => '2022-08-03 07:14:33',
            ),
        ));
        
        
    }
}