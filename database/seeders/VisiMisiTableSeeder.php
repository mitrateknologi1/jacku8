<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisiMisiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('visi_misi')->delete();
        
        \DB::table('visi_misi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'VISI FT UNTAD 2020 - 2045',
                'isi' => '<p>Fakultas Teknik berstandar internasional dalam pengembangan rekayasa teknologi dan seni yang berwawasan lingkungan.</p>',
                'created_at' => '2022-07-31 13:12:07',
                'updated_at' => '2022-07-31 13:23:13',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'MISI FT UNTAD 2020 - 2045',
                'isi' => '<p>1. Menyelenggarakan dan mengembangkan pendidikan berbasis teknologi dan seni yang berstandar internasional.</p>

<p>2. Menyelenggarakan penelitian berkualitas dan inovatif berbasis pembangunan berkelanjutan dan mitigasi bencana untuk mendukung pembangunan daerah, nasional, dan internasional.</p>

<p>3. Melakukan pengabdian kepada masyarakat melalui penerapan dan pengembangan teknologi yang berlandaskan budaya dan kearifan lokal.</p>

<p>4. Melakukan kerjasama pendidikan dan penelitian dalam pengembangan dan penerapan teknologi secara nasional dan internasional.</p>',
                'created_at' => '2022-07-31 13:12:07',
                'updated_at' => '2022-07-31 13:23:24',
            ),
        ));
        
        
    }
}