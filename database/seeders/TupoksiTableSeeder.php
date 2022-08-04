<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TupoksiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tupoksi')->delete();
        
        \DB::table('tupoksi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Ketua',
                'isi' => '<p>1. Meningkatkan publikasi dosen luaran jurnal terindeks scopus dan terindek sinta.</p>

<p>2. Melakukan standarisasi kurikulum berdasarkan standar nasional yang ditetapkan.</p>

<p>3. Mengurangi lama masa studi mahasiswa.</p>

<p>4. Meningkatkan kerjasama dan implementasi.</p>',
                'created_at' => '2022-08-01 02:13:51',
                'updated_at' => '2022-08-01 02:16:47',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Sekretaris',
                'isi' => '<p>1. Membantu tugas ketua.</p>

<p>2. Pembuatan profil UPSP.</p>

<p>3. Melaksanakan administrasi UPSP (absensi, SK kegiatan, membuat laporan kegiatan, undangan, dll).</p>

<p>4. Menyusun program kerja dan anggaran kegiatan (RKAKL).</p>

<p>5. Menyusun jadwal kegiatan.</p>',
                'created_at' => '2022-08-01 02:13:51',
                'updated_at' => '2022-08-01 02:17:00',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Divisi Pengembangan Kurikulum dan Pembelajaran',
                'isi' => '<p>1. Melaksanakan inovasi-inovasi dalam pembelajaran dan peninjauan tentang kurikulum tiap program studi.</p>

<p>2. Melaksanakan Monitoring dan evaluasi kurikulum program studi sesuai standar yang ditetapkan (KKNI).</p>

<p>3. Merencanakan program kegiatan untuk pengembagan kurikulum program studi (workshop, pelatihan-pelatihan).</p>

<p>4. Menyusun system kegiatan pengembangan kurikulum dan pembelajaran ( aturan, mekanisme) secara terpadu di tingkat fakultas.</p>',
                'created_at' => '2022-08-01 02:13:51',
                'updated_at' => '2022-08-01 02:17:14',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Divisi Penelitian dan Pengadian Pada Masyarakat',
                'isi' => '<p>1. Mendukung dan mengkoordinir peningkatan kualitas dan kuantitas penelitian dan pengabdian pada masyarakat melalui sosialisasi, workshop dan pelatihan.</p>

<p>2. Melaksanakan pengelolahan administrasi penelitian dan pengabdian mencakup ususlan, monev, laporan hasil dan luaran penelitian.</p>

<p>3. Melakukan dukungan dan pembinaan guna peningkatan publikasi luaran penelitian dan pengabdian pada masyarakat melalui workshop dan pelatihan.</p>

<p>4. Mendukung peningkatan kepemilikan HAKI dan Hak Cipta bagi dosen Fakultas Teknik melalui sosialisasi, workshop, dan pelatihan.</p>

<p>5. Melaksanakan sosialisasi dan pelatihan pembimbingan PKM.</p>',
                'created_at' => '2022-08-01 02:13:51',
                'updated_at' => '2022-08-01 02:17:28',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Divisi Kerjasama dan Publikasi Jurnal',
                'isi' => '<p>1. Melakukan pendataan jurnal dan publikasi.</p>

<p>2. Pembinaan pengelolaan jurnal dan peningkatan status jurnal.</p>',
                'created_at' => '2022-08-01 02:13:51',
                'updated_at' => '2022-08-01 02:17:36',
            ),
        ));
        
        
    }
}