<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SejarahTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sejarah')->delete();
        
        \DB::table('sejarah')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Sejarah',
            'isi' => '<p>Pendirian UNIT PENGEMBANGAN SUMBERDAYA PEMBELAJARAN (UPSP) berdasarkan SK Rektor Universitas Tadulako No. 2665/UN28/KP/2020 Tentang pengangkatan pengelola UPSP. Kegiatan Unit Pengembangan Sumberdaya Pembelajaran (UPSP) dimulai pada Tahun 2019 yang diketuai oleh Dr. Zefitni, MT. dan dilanjutkan oleh Dr. Ir. Setiyawan, ST., MT. pada Tahun 2020 sampai saat ini. Harapan kami hasil kerja selama ini dapat ditindak lanjuti sehingga dapat meningkatkan kualitas dan kinerja program studi di Fakultas Teknik Universitas Tadulako Palu.<br />
<br />
Kualitas pendidikan tinggi merupakan kegiatan sistemik yang dilakukan untuk meningkatkan mutu pendidikan secara terencana dan berkelanjutan. Undang Undang Republik Indonesia, Nomor 12 Tahun 2012 pasal 53 tentang Pendidikan Tinggi, dikemukakan &ldquo;sistem penjaminan mutu internal yang dikembangkan oleh Perguruan Tinggi meliputi 10 standar : standar isi, standar proses, standar kompetensi lulusan, standar pendidik dan tenaga kependidikan, standar sarana dan prasarana, standar pengelolaan, standar pembiayaan, standar penilaian, penelitian dan standar pengabdian kepada masyarakat. Sistem penjaminan mutu secara eksternal yang dilakukan melalui akreditasi oleh Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT).</p>',
                'created_at' => '2022-07-31 12:42:44',
                'updated_at' => '2022-07-31 13:01:39',
            ),
        ));
        
        
    }
}