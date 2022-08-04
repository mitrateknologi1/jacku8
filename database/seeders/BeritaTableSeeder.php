<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('berita')->delete();
        
        \DB::table('berita')->insert(array (
            0 => 
            array (
                'id' => 1,
                'judul' => 'Sosialisasi Kampus Mengajar Untuk Dosen dan Mahasiswa',
                'kategori_berita_id' => 1,
                'tanggal' => '2021-02-22',
                'deskripsi_singkat' => 'Sosialisasi MBKM FATEK UNTAD',
                'isi' => '<p>Kegiatan ini dihadiri oleh dosen dan mahasiswa fakultas teknik yang berjumlah 122 Peserta, Pemateri pada sosialisasi ini adalah Bapak Ir. Andi Arham Adam, ST., MT., Ph.D selaku Wakil Dekan I Bidang Akademik Fakultas Teknik Universitas Tadulako.</p>

<p><img alt="" src="http://jacku.test//storage/photos/1/3.png" style="height:325px; width:621px" /></p>

<p>Kontribusi mahasiswa kampus mengajar yaitu membantu guru dalam pelaksanaan pembelajaran khususnya dalam pembelajaran literasi dan numerisasi, membantu adaptasi dalam proses pembelajaran daring atau luring, mendukung kepala sekolah dalam bidang administrasi dan manajerial sekolah, tiga hal ini merupakan inti pelaksanaan mahasiswa kampus mengajar. Kontribusi mahasiswa kampus mengajar yang mana kalian menjadi agen promosi program program yang diberikan dan telah disediakan oleh Kemendikbud. Kemendikbud telah mempersiapkan seperti kurikulum pembelajaran dan lain lain untuk dapat di akses oleh guru, murid dan orangtua.</p>

<p>Manfaat untuk mahasiswa Untad yang mengikuti kampus mengajar yaitu berguna untuk mengembangkan diri, khususnya kreativitas, kepemimpinan dan kemampuan interpersonal, mendapatkan pengalaman yang nyata dilapangan, mampu mengasah kemampuan berpikir kritis dan pemecah masalah, konversi sks untuk memenuhi syarat penyelesaian gelar sarjanamu sebesar 20 sks, mendapatkan piagam penghargaan peserta kampus mengajar, serta mendapatkan uang sangu dan potongan UKT. Sudah tercatat sekitar 17.000 mahasiswa yang ditempatkan di 3400 SD dan 3000 mahasiswa ditempatkan di 375 SMP diseluruh Indonesia.</p>

<p><img alt="" src="http://jacku.test//storage/photos/1/2.png" style="height:332px; width:622px" /></p>

<p>Selain manfaat bagi mahasiswa juga terdapat manfaat bagi Dosen dan perguruan tinggi yang mengikuti kegiatan kampus mengajar seperti dapat berkontribusi nyata bagi penyelesaian permasalahan pendidikan khususnya masa pandemi, memberi kesempatan kepada dosen lintas prodi untuk berkolaborasi dengan mahasiswa, sekolah dan guru dalam pengembangan pendidikan, memberi ruang pengabdian, penerapan berbagai kajian inovasi dan kreativitas yang dihasilkan dosen dalam meningkatkan mutu pendidikan.</p>

<p><strong>Edit : TIM UPSP FATEK UNTAD</strong></p>',
                'sumber' => 'Divisi Kurikulum / Penelitian',
                'foto' => '1659406343.jpg',
                'created_at' => '2022-08-02 02:12:23',
                'updated_at' => '2022-08-02 02:12:23',
            ),
            1 => 
            array (
                'id' => 2,
                'judul' => 'PELATIHAN REVIEWER TINGKAT FAKULTAS TEKNIK',
                'kategori_berita_id' => 1,
                'tanggal' => '2022-06-20',
                'deskripsi_singkat' => 'Kegiatan Pelatihan',
                'isi' => '<p>Pelatihan Reviewer Tingkat Fakultas Teknik yang di Selenggarakan Pada Hari Senin, 20-21 Juni 2022 Bertempat di Ruang Senat Fakultas Teknik.</p>

<p>Dimana Dalam Kegiatan ini Unit UPSP Mengundang 25 Orang&nbsp;Dosen yang Berkriteria Pendidikan Terkahir S3 Dan Berikut&nbsp;Utusan Dari 5 Jurusan yaitu :</p>

<p>1. Jurusan Teknik Sipil Mengutus 10 Orang</p>

<p>2. Jurusan Teknik Informatika Mengutus 2 Orang</p>

<p>3. Jurusan Teknik Mesin Mengutus 5 Orang</p>

<p>4. Jurusan Teknik Elektro Mengutus 3 Orang</p>

<p>5. Jurusan Teknik Arsitektur Mengutus 5 Orang.</p>',
                'sumber' => 'Divisi Jurnal',
                'foto' => '1659406535.jpg',
                'created_at' => '2022-08-02 02:15:35',
                'updated_at' => '2022-08-02 02:15:35',
            ),
            2 => 
            array (
                'id' => 3,
                'judul' => 'Penyerahan SK Kurikulum',
                'kategori_berita_id' => 1,
                'tanggal' => '2021-04-13',
                'deskripsi_singkat' => 'Divisi Kurikulum',
                'isi' => '<p>Penyerahan SK Kurikukum Pada Rapat Senat Fakultas Teknik dan Pengesahan Kurikulum Berbasis KKNI Dari :</p>

<p>Prodi S1 PWK, Prodi S1 Teknik Mesin dan&nbsp;Prodi Program Profesi (PPI)</p>',
                'sumber' => 'Divisi Kurikulum / Penelitian',
                'foto' => '1659406807.jpg',
                'created_at' => '2022-08-02 02:20:07',
                'updated_at' => '2022-08-02 02:20:07',
            ),
        ));
        
        
    }
}