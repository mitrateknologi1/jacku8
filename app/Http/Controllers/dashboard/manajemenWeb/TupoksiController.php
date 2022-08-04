<?php

namespace App\Http\Controllers\dashboard\manajemenWeb;

use App\Http\Controllers\Controller;
use App\Models\Tupoksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TupoksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTupoksi = Tupoksi::orderBy('id', 'asc')->get();
        return view('dashboard.pages.manajemenWeb.tupoksi.index', compact(['listTupoksi']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tupoksi  $tupoksi
     * @return \Illuminate\Http\Response
     */
    public function show(Tupoksi $tupoksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tupoksi  $tupoksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Tupoksi $tupoksi)
    {
        return view('dashboard.pages.manajemenWeb.tupoksi.edit', compact(['tupoksi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tupoksi  $tupoksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tupoksi $tupoksi)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'isi' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'isi.required' => 'Isi tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $tupoksi->nama = $request->nama;
        $tupoksi->isi = $request->isi;
        $tupoksi->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tupoksi  $tupoksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tupoksi $tupoksi)
    {
        //
    }
}
