<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ArsipJurnal;
use App\Models\ArsipKurikulum;
use App\Models\ArsipPenelitian;
use App\Models\BahanAjar;
use App\Models\Berita;
use App\Models\Kurikulum;
use App\Models\Modul;
use App\Models\Monitoring;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Prodi;
use App\Models\Rps;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = $this->_totalBerita();
        $totalDokumen = $this->_totalDokumen();
        $totalProdi = $this->_totalProdi();
        $totalDosen = $this->_totalDosen();
        return view('dashboard.pages.dashboard.index', compact(['totalBerita', 'totalDokumen', 'totalProdi', 'totalDosen']));
    }

    private function _totalBerita()
    {
        $berita = Berita::count();
        return $berita;
    }

    private function _totalDokumen()
    {
        $kurikulum = Kurikulum::count();
        $modul = Modul::count();
        $bahanAjar = BahanAjar::count();
        $rps = Rps::count();
        $monitoring = Monitoring::count();
        $arsipKurikulum = ArsipKurikulum::count();
        $penelitian = Penelitian::count();
        $pengabdian = Pengabdian::count();
        $arsipPenelitian = ArsipPenelitian::count();
        $arsipJurnal = ArsipJurnal::count();

        $totalDokumen = ($kurikulum + $modul + $bahanAjar + $rps + $monitoring + $arsipKurikulum + $penelitian + $pengabdian + $arsipPenelitian + $arsipJurnal);
        return $totalDokumen;
    }

    private function _totalProdi()
    {
        $prodi = Prodi::count();
        return $prodi;
    }

    private function _totalDosen()
    {
        $dosen = User::where('role', 'dosen')->count();
        return $dosen;
    }
}
