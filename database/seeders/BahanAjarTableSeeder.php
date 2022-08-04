<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BahanAjarTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bahan_ajar')->delete();
        
        \DB::table('bahan_ajar')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'MK Sistem Digital',
                'prodi_id' => 8,
                'tahun' => '2021',
                'tanggal_upload' => '2021-08-09',
                'jenis_dokumen' => 'Privat',
                'file' => '729c2321b74a33df7910b5abee751f7e.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'MK KLH',
                'prodi_id' => 8,
                'tahun' => '2021',
                'tanggal_upload' => '2021-08-09',
                'jenis_dokumen' => 'Privat',
                'file' => 'b2adcb3d9248945ae66b8fc5bdec7abb.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'MK Kalkulus',
                'prodi_id' => 8,
                'tahun' => '2021',
                'tanggal_upload' => '2021-08-09',
                'jenis_dokumen' => 'Publik',
                'file' => '7bcb5584cf632a9bb95c85e5a780c512.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'MK Interaksi Manusia dan Komputer',
                'prodi_id' => 8,
                'tahun' => '2021',
                'tanggal_upload' => '2021-08-09',
                'jenis_dokumen' => 'Privat',
                'file' => '3ca4bc807c3cb0b7ab2cd446180e3c91.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'MK Statistika',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '18b9f4829f392e1f0e1d47657ba523f8.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'MK Basis Data',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '6d3d4bb551c9b48a94d6e4b44332685b.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            6 => 
            array (
                'id' => 7,
                'nama' => 'MK Organisasi Komputer',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'c5b261b35688deafb8249a81e757a746.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            7 => 
            array (
                'id' => 8,
                'nama' => 'MK Jaringan Komputer',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '03f1576e07963fee70ec5f9063fec866.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            8 => 
            array (
                'id' => 9,
                'nama' => 'MK Pemograman Berbasis Jaringan',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'c43bbc1471d9187e26fbcda5150bb3c7.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            9 => 
            array (
                'id' => 10,
                'nama' => 'MK Sistem Informasi',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'bea95f731a788d8811c1e39e9aee289b.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            10 => 
            array (
                'id' => 11,
                'nama' => 'MK Perancangan Analisis dan Algoritma 1',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '3964b050fa9c59b74f05fb19865cdb76.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            11 => 
            array (
                'id' => 12,
                'nama' => 'MK Perancangan Analisis dan Algoritma 2',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '1d604f77882c3fcbffc6acf6e29eb82c.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            12 => 
            array (
                'id' => 13,
                'nama' => 'MK Keamanan Sistem Komputer',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '2bd047031db21e334abdb353e1cd13db.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            13 => 
            array (
                'id' => 14,
                'nama' => 'MK Kewirausahaan',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '9df2bafd17724c2d5ae2eafaebaaf4b1.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            14 => 
            array (
                'id' => 15,
                'nama' => 'MK Cloud Computing',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'd7c120de008a1fc566886dcb28139ab9.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            15 => 
            array (
                'id' => 16,
                'nama' => 'MK Sistem Informasi Geografi',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'cdad3bd33206a1f648f50a2250504ce3.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            16 => 
            array (
                'id' => 17,
                'nama' => 'MK Pengolahan Citra Digital',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'cc6f922a5e002249b2890b9681315622.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            17 => 
            array (
                'id' => 18,
                'nama' => 'MK Pemograman API',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'a6291c1f52e572beed9402b6479bfb66.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            18 => 
            array (
                'id' => 19,
                'nama' => 'MK Pengenalan Pola',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '9212bca2ae3784f0988a34b1335caf53.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            19 => 
            array (
                'id' => 20,
                'nama' => 'MK Metode Penelitian',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '8b7a07ed27943c7cf99043001adb18a9.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            20 => 
            array (
                'id' => 21,
                'nama' => 'MK Sistem Informasi Geografi 2',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'bbb55dc19e090566d58c7cdf82e129c6.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            21 => 
            array (
                'id' => 22,
                'nama' => 'MK Pemograman Paralel',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'a7d4728b95045161a28338bc277e39c0.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            22 => 
            array (
                'id' => 23,
                'nama' => 'MK Pemograman Mobile',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '7b6f3862809ed0d71f3d93873bef4131.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            23 => 
            array (
                'id' => 24,
                'nama' => 'MK Data warehouse',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '43b8c23208c7d808ccc7d5f3aceccd6b.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            24 => 
            array (
                'id' => 25,
                'nama' => 'MK Data Warehouse',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '316cd03cf81144f65a0c869e72eaa1d8.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            25 => 
            array (
                'id' => 26,
                'nama' => 'MK Sistem Informasi Manajemen',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '7482a6e48f89208adbff2f68426d9998.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            26 => 
            array (
                'id' => 27,
                'nama' => 'MK Audit Sistem',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '27e9c46c32bbccf3f473abd37ff6b9b2.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            27 => 
            array (
                'id' => 28,
                'nama' => 'MK Digital Forensik',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'bcb424593de587f514b00acc44ed2c7d.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            28 => 
            array (
                'id' => 29,
                'nama' => 'MK Computer Vision',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => '10d542cc04b3ffbbd4fe5f470a786d25.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
            29 => 
            array (
                'id' => 30,
                'nama' => 'MK Bioinformatika',
                'prodi_id' => 8,
                'tahun' => '2020',
                'tanggal_upload' => '2021-08-16',
                'jenis_dokumen' => 'Privat',
                'file' => 'bc697381d624b5d682e32a4e62ccebce.rar',
                'created_at' => '2022-08-03 06:59:43',
                'updated_at' => '2022-08-03 06:59:43',
            ),
        ));
        
        
    }
}