<?php

namespace App\Http\Controllers\dashboard\masterData;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\JabatanFungsional;
use App\Models\Prodi;
use App\Models\Profil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('created_at', 'asc')
                ->where('role', $request->role)
                ->whereHas('profil', function ($query) use ($request) {
                    if ($request->search) {
                        $query->where('nama', 'like', '%' . $request->search . '%');
                        $query->orWhere('nidn', 'like', '%' . $request->search . '%');
                        $query->orWhere('nip', 'like', '%' . $request->search . '%');
                    }

                    $query->whereHas('prodi', function ($query) use ($request) {
                        if ($request->prodi && $request->prodi != "Semua") {
                            $query->where('id', $request->prodi);
                        }
                    });
                })
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    return $row->profil->nama;
                })
                ->addColumn('nidn', function ($row) {
                    return $row->profil->nidn . " / " . $row->profil->nip;
                })
                ->addColumn('prodi', function ($row) {
                    return $row->profil->prodi->nama;
                })
                ->addColumn('role', function ($row) {
                    if ($row->role == "admin") {
                        return "Admin";
                    } else if ($row->role == "kurikulum") {
                        return "Kurikulum";
                    } else if ($row->role == "penelitian") {
                        return "Penelitian";
                    } else if ($row->role == "kerja_sama") {
                        return "Kerja Sama";
                    } else {
                        return "Dosen";
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-lihat" class="btn btn-success btn-sm mr-1" value="' . $row->id . '" ><i class="far fa-eye"></i> Lihat</button><a id="btn-edit" class="btn btn-warning btn-sm mr-1" href="' . url('master-data/akun/' . $row->id . '/edit') . '"><i class="fas fa-edit"></i> Ubah</a><button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $listProdi = Prodi::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.akun.index', compact(['listProdi']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarGolongan = Golongan::orderBy('nama', 'asc')->get();
        $daftarJabatanFungsional = JabatanFungsional::orderBy('nama', 'asc')->get();
        $daftarProdi = Prodi::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.masterData.akun.create', compact(['daftarGolongan', 'daftarJabatanFungsional', 'daftarProdi']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => ['required', Rule::unique('users')],
                'password' => 'required|min:6',
                'role' => 'required',
                'nama' => 'required',
                'nidn' => 'required',
                'nip' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'golongan' => 'required',
                'jabatan_fungsional' => 'required',
                'prodi' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'username.unique' => 'Username sudah digunakan',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password minimal 6 karakter',
                'role.required' => 'Role tidak boleh kosong',
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

        $namaFoto = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('akun/foto', $namaFoto);

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        $profil = new Profil();
        $profil->users_id = $user->id;
        $profil->nama = $request->nama;
        $profil->nidn = $request->nidn;
        $profil->nip = $request->nip;
        $profil->tempat_lahir = $request->tempat_lahir;
        $profil->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        $profil->golongan_id = $request->golongan;
        $profil->jabatan_fungsional_id = $request->jabatan_fungsional;
        $profil->prodi_id = $request->prodi;
        $profil->foto = $namaFoto;
        $profil->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data = [
            'nama' => $user->profil->nama,
            'nidn' => $user->profil->nidn . " / " . $user->profil->nip,
            'tempat_tanggal_lahir' => $user->profil->tempat_lahir . ", " . Carbon::parse($user->profil->tanggal_lahir)->translatedFormat('d F Y'),
            'prodi' => $user->profil->prodi->nama,
            'pangkat_golongan' => $user->profil->golongan->nama,
            'jabatan_fungsional' => $user->profil->jabatanFungsional->nama,
            'username' => $user->username,
            'foto' => Storage::url('/akun/foto/' . $user->profil->foto)
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
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
        return view('dashboard.pages.masterData.akun.edit', compact(['daftarGolongan', 'daftarJabatanFungsional', 'daftarProdi', 'user']));
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
                'role' => 'required',
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
                'role.required' => 'Role tidak boleh kosong',
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
        $user->role = $request->role;
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
        $user->delete();

        if (Storage::exists('akun/foto/' . $user->profil->foto)) {
            Storage::delete('akun/foto/' . $user->profil->foto);
        }

        Profil::where('users_id', $user->id)->delete();

        return response()->json(['status' => 'success']);
    }
}
