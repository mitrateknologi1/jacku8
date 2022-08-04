<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\JabatanFungsional;
use App\Models\Prodi;
use App\Models\Profil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $daftarGolongan = Golongan::orderBy('nama', 'asc')->get();
        $golonganHapus = Golongan::where('id', $user->profil->golongan_id)->withTrashed()->first();
        if ($golonganHapus->trashed()) {
            $daftarGolongan->push($golonganHapus);
        }

        $daftarJabatanFungsional = JabatanFungsional::orderBy('nama', 'asc')->get();
        $jabatanFungsionalHapus = JabatanFungsional::where('id', $user->profil->jabatan_fungsional_id)->withTrashed()->first();
        if ($jabatanFungsionalHapus->trashed()) {
            $daftarJabatanFungsional->push($jabatanFungsionalHapus);
        }

        $daftarProdi = Prodi::orderBy('nama', 'asc')->get();
        $prodiHapus = Prodi::where('id', $user->profil->prodi_id)->withTrashed()->first();
        if ($prodiHapus->trashed()) {
            $daftarProdi->push($prodiHapus);
        }
        return view('dashboard.pages.profil.index', compact(['daftarGolongan', 'daftarJabatanFungsional', 'daftarProdi', 'user']));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => ['required', Rule::unique('users')->ignore($user->id)],
                'password' => $request->password ? 'required|min:6' : 'nullable',
                'nama' => 'required',
                'nidn' => 'required',
                'nip' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'golongan' => 'required',
                'jabatan_fungsional' => 'required',
                'prodi' => 'required',
                'foto' => $request->foto ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024' : 'nullable',
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'username.unique' => 'Username sudah digunakan',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 6 karakter',
                'nama.required' => 'Nama tidak boleh kosong',
                'nidn.required' => 'NIDN tidak boleh kosong',
                'nip.required' => 'NIP tidak boleh kosong',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
                'golongan.required' => 'Golongan Pangkat tidak boleh kosong',
                'jabatan_fungsional.required' => 'Jabatan Fungsional tidak boleh kosong',
                'prodi.required' => 'Program Studi tidak boleh kosong',
                'foto.required' => 'Foto tidak boleh kosong',
                'foto.image' => 'Foto harus berupa gambar',
                'foto.mimes' => 'Foto harus berupa gambar',
                'foto.max' => 'Foto tidak boleh lebih dari 1 MB',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user->username = $request->username;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $profil = Profil::where('users_id', $user->id)->first();

        if ($request->foto) {
            if (Storage::exists('akun/foto/' . $profil->foto)) {
                Storage::delete('akun/foto/' . $profil->foto);
            }

            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('akun/foto', $namaFoto);
            $profil->foto = $namaFoto;
        }

        $profil->users_id = $user->id;
        $profil->nama = $request->nama;
        $profil->nidn = $request->nidn;
        $profil->nip = $request->nip;
        $profil->tempat_lahir = $request->tempat_lahir;
        $profil->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $profil->golongan_id = $request->golongan;
        $profil->jabatan_fungsional_id = $request->jabatan_fungsional;
        $profil->prodi_id = $request->prodi;

        $profil->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
