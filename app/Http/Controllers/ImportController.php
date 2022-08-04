<?php

namespace App\Http\Controllers;

use App\Imports\BahanAjarImport;
use App\Imports\KurikulumImport;
use App\Imports\ModulImport;
use App\Imports\PenelitianImport;
use App\Imports\PengabdianImport;
use App\Imports\RpsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function bahanAjar()
    {
        Excel::import(new BahanAjarImport, 'BahanAjar.xlsx');
        return "Import Bahan Ajar";
    }

    public function kurikulum()
    {
        Excel::import(new KurikulumImport, 'Kurikulum.xlsx');
        return "Import Kurikulum";
    }

    public function modul()
    {
        Excel::import(new ModulImport, 'Modul.xlsx');
        return "Import Modul";
    }

    public function penelitian()
    {
        Excel::import(new PenelitianImport, 'Penelitian.xlsx');
        return "Import Penelitian";
    }

    public function pengabdian()
    {
        Excel::import(new PengabdianImport, 'Pengabdian.xlsx');
        return "Import Pengabdian";
    }

    public function rps()
    {
        Excel::import(new RpsImport, 'Rps.xlsx');
        return "Import Rps";
    }
}
