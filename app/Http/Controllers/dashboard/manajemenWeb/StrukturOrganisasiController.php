<?php

namespace App\Http\Controllers\dashboard\manajemenWeb;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listStruktur = StrukturOrganisasi::orderBy('id', 'asc')->get();
        return view('dashboard.pages.manajemenWeb.strukturOrganisasi.index', compact(['listStruktur']));
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
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('dashboard.pages.manajemenWeb.strukturOrganisasi.edit', compact(['strukturOrganisasi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'jabatan' => 'required',
                'nama' => 'required',
                'pekerjaan' => 'required',
                'pendidikan' => 'required',
                'email' => 'required',
                'foto' => $request->foto ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024' : 'nullable',
            ],
            [
                'jabatan.required' => 'Jabatan tidak boleh kosong',
                'nama.required' => 'Nama tidak boleh kosong',
                'pekerjaan.required' => 'Pekerjaan tidak boleh kosong',
                'pendidikan.required' => 'Pendidikan tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'foto.required' => 'Foto tidak boleh kosong',
                'foto.image' => 'Foto harus berupa gambar',
                'foto.mimes' => 'Foto harus berupa gambar',
                'foto.max' => 'Foto tidak boleh lebih dari 1 MB',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if ($request->foto) {
            if (Storage::exists('struktur_organisasi/' . $strukturOrganisasi->foto)) {
                Storage::delete('struktur_organisasi/' . $strukturOrganisasi->foto);
            }

            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('struktur_organisasi', $namaFoto);
            $strukturOrganisasi->foto = $namaFoto;
        }

        $strukturOrganisasi->nama = $request->nama;
        $strukturOrganisasi->jabatan = $request->jabatan;
        $strukturOrganisasi->pekerjaan = $request->pekerjaan;
        $strukturOrganisasi->pendidikan = $request->pendidikan;
        $strukturOrganisasi->email = $request->pendidikan;
        $strukturOrganisasi->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StrukturOrganisasi  $strukturOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        //
    }
}
