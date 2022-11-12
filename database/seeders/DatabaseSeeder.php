<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Storage::deleteDirectory('/akun');
        Storage::deleteDirectory('/berita');
        Storage::deleteDirectory('/divisiJurnal');
        Storage::deleteDirectory('/divisiKurikulum');
        Storage::deleteDirectory('/divisiPenelitian');
        Storage::deleteDirectory('/files');
        Storage::deleteDirectory('/photos');
        Storage::deleteDirectory('/struktur_organisasi');
        Storage::deleteDirectory('/tampilan_beranda');

        File::copyDirectory(
            public_path('file_dummy'),
            storage_path('app/public/')
        );

        $this->call(GolonganSeeder::class);
        $this->call(JabatanFungsionalSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(SkemaPenelitianSeeder::class);
        $this->call(SkemaPengabdianSeeder::class);
        $this->call(SumberDanaSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(KategoriBeritaSeeder::class);
        $this->call(KontakSeeder::class);
        $this->call(SejarahTableSeeder::class);
        $this->call(VisiMisiTableSeeder::class);
        $this->call(TupoksiTableSeeder::class);
        $this->call(StrukturOrganisasiSeeder::class);
        $this->call(TampilanBerandaSeeder::class);
        $this->call(ArsipJurnalTableSeeder::class);
        $this->call(ArsipKurikulumTableSeeder::class);
        $this->call(ArsipPenelitianTableSeeder::class);
        $this->call(BahanAjarTableSeeder::class);
        $this->call(BeritaTableSeeder::class);
        $this->call(KurikulumTableSeeder::class);
        $this->call(ModulTableSeeder::class);
        $this->call(MonitoringTableSeeder::class);
        $this->call(PenelitianTableSeeder::class);
        $this->call(PengabdianTableSeeder::class);
        $this->call(RpsTableSeeder::class);
    }
}
