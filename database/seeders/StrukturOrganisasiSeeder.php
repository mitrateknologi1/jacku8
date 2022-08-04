<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'jabatan' => 'Dekan Fakultas Teknik',
                'nama' => 'Dr. Eng. Ir. ANDI RUSDIN, S.T., M.T., M.Sc.',
                'pekerjaan' => 'Dosen Fakultas Teknik',
                'pendidikan' => 'Doktor',
                'email' => 'andi.rusdin@gmail.com',
                'foto' => 'ketua_teknik.jpg'
            ],
            [
                'id' => 2,
                'jabatan' => 'Ketua UPSP',
                'nama' => 'Dr. Ir. Setiyawan, ST., MT.',
                'pekerjaan' => 'Dosen Sipil',
                'pendidikan' => 'Doktor',
                'email' => 'setiyawanvip@yahoo.co.id',
                'foto' => 'ketua_upsp.jpg'
            ],
            [
                'id' => 3,
                'jabatan' => 'Sekretaris UPSP',
                'nama' => 'Dr. Nina Bariroh Rustiati, ST., MT',
                'pekerjaan' => 'Dosen Sipil',
                'pendidikan' => 'Doktor',
                'email' => 'neen211273@gmail.com',
                'foto' => 'sekretaris_upsp.jpg'
            ],
            [
                'id' => 4,
                'jabatan' => 'Divisi Pengembangan Kurikulum dan Pembelajaran',
                'nama' => 'Dr. Ratnasari Ramlan, ST., MT',
                'pekerjaan' => 'Dosen Teknik Sipil',
                'pendidikan' => '-',
                'email' => '-',
                'foto' => 'divisi_kurikulum.jpg'
            ],
            [
                'id' => 5,
                'jabatan' => 'Divisi Penelitian dan Pengabdian Pada Masyarakat',
                'nama' => 'Lutfiah, ST., MT',
                'pekerjaan' => 'Dosen Arsitek',
                'pendidikan' => 'Master Asritek',
                'email' => 'luthfiahthaha95@gmail.com',
                'foto' => 'divisi_penelitian.png'
            ],
            [
                'id' => 6,
                'jabatan' => 'Divisi Kerjasama dan Pengembangan Publikasi Jurnal',
                'nama' => 'Dr. Eng. Puteri Fitriaty, ST, MT',
                'pekerjaan' => 'Dosen Arsitek',
                'pendidikan' => 'Doktor',
                'email' => 'puteri_fitriaty@yahoo.com',
                'foto' => 'divisi_kerja_sama.png'
            ],
            [
                'id' => 7,
                'jabatan' => 'Sekretaris Divisi Kerjasama dan Pengembangan Publikasi Jurnal',
                'nama' => 'Zuliyarni,S.Pd.',
                'pekerjaan' => 'Sekretaris',
                'pendidikan' => 'Sarjana',
                'email' => '-',
                'foto' => 'sekretaris_divisi_kerja_sama.jpg'
            ],
        ];

        DB::table('struktur_organisasi')->insert($data);
    }
}
