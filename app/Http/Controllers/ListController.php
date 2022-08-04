<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\SkemaPenelitian;
use App\Models\SkemaPengabdian;
use App\Models\SumberDana;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function prodi(Request $request)
    {
        $idProdi = $request->idProdi;
        $prodi = Prodi::orderBy('nama', 'asc')->get();

        if ($idProdi) {
            $prodiHapus = Prodi::where('id', $idProdi)->withTrashed()->first();
            if ($prodiHapus->trashed()) {
                $prodi->push($prodiHapus);
            }
        }

        return response()->json($prodi);
    }

    public function skemaPenelitian(Request $request)
    {
        $idSkema = $request->idSkema;
        $skema = SkemaPenelitian::orderBy('nama', 'asc')->get();

        if ($idSkema) {
            $skemaHapus = SkemaPenelitian::where('id', $idSkema)->withTrashed()->first();
            if ($skemaHapus->trashed()) {
                $skema->push($skemaHapus);
            }
        }

        return response()->json($skema);
    }

    public function skemaPengabdian(Request $request)
    {
        $idSkema = $request->idSkema;
        $skema = SkemaPengabdian::orderBy('nama', 'asc')->get();

        if ($idSkema) {
            $skemaHapus = SkemaPengabdian::where('id', $idSkema)->withTrashed()->first();
            if ($skemaHapus->trashed()) {
                $skema->push($skemaHapus);
            }
        }

        return response()->json($skema);
    }

    public function sumberDana(Request $request)
    {
        $idSumberDana = $request->idSumberDana;
        $sumberDana = SumberDana::orderBy('nama', 'asc')->get();

        if ($idSumberDana) {
            $sumberDanaHapus = SumberDana::where('id', $idSumberDana)->withTrashed()->first();
            if ($sumberDanaHapus->trashed()) {
                $sumberDana->push($sumberDanaHapus);
            }
        }

        return response()->json($sumberDana);
    }
}
