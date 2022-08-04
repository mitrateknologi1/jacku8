<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
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
                'users_id' => 1,
                'nama' => 'Admin',
                'nidn' => '00000',
                'nip' => '00000',
                'tempat_lahir' => 'Parigi',
                'tanggal_lahir' => '1999-08-16',
                'golongan_id' => 1,
                'prodi_id' => 1,
                'jabatan_fungsional_id' => 1,
            ],
            [
                'id' => 2,
                'users_id' => 2,
                'nama' => 'Kurikulum',
                'nidn' => '00000',
                'nip' => '00000',
                'tempat_lahir' => 'Parigi',
                'tanggal_lahir' => '1999-08-16',
                'golongan_id' => 1,
                'prodi_id' => 1,
                'jabatan_fungsional_id' => 1,
            ],
            [
                'id' => 3,
                'users_id' => 3,
                'nama' => 'Penelitian',
                'nidn' => '00000',
                'nip' => '00000',
                'tempat_lahir' => 'Parigi',
                'tanggal_lahir' => '1999-08-16',
                'golongan_id' => 1,
                'prodi_id' => 1,
                'jabatan_fungsional_id' => 1,
            ],
            [
                'id' => 4,
                'users_id' => 4,
                'nama' => 'Kerja Sama',
                'nidn' => '00000',
                'nip' => '00000',
                'tempat_lahir' => 'Parigi',
                'tanggal_lahir' => '1999-08-16',
                'golongan_id' => 1,
                'prodi_id' => 1,
                'jabatan_fungsional_id' => 1,
            ],
            [
                'id' => 5,
                'users_id' => 5,
                'nama' => 'Dosen',
                'nidn' => '00000',
                'nip' => '00000',
                'tempat_lahir' => 'Parigi',
                'tanggal_lahir' => '1999-08-16',
                'golongan_id' => 1,
                'prodi_id' => 1,
                'jabatan_fungsional_id' => 1,
            ],
        ];

        DB::table('profil')->insert($data);
    }
}
