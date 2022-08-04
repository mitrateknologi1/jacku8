<?php

namespace App\Http\Controllers\dashboard\berita;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Berita::orderBy('created_at', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->kategori && $request->kategori != "Semua") {
                        $query->where('kategori_berita_id', $request->kategori);
                    }

                    if ($request->sumber && $request->sumber != "Semua") {
                        $query->where('sumber', $request->sumber);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('judul', 'like', '%' . $request->search . '%');
                        });
                    }
                })->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori', function ($row) {
                    return $row->kategoriBerita->nama ?? "-";
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a id="btn-edit" class="btn btn-warning btn-sm mr-1" href="' . url('/berita/berita/' . $row->id . '/edit') . '"><i class="fas fa-edit"></i> Ubah</a><button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $listKategori = KategoriBerita::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.berita.berita.index', compact(['listKategori']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listKategori = KategoriBerita::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.berita.berita.create', compact(['listKategori']));
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
                'judul' => 'required',
                'isi' => 'required',
                'deskripsi_singkat' => 'required',
                'tanggal' => 'required',
                'kategori' => 'required',
                'sumber' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ],
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'isi.required' => 'Isi tidak boleh kosong',
                'deskripsi_singkat.required' => 'Deskripsi singkat tidak boleh kosong',
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'kategori.required' => 'Kategori tidak boleh kosong',
                'sumber.required' => 'Sumber tidak boleh kosong',
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
        $request->foto->storeAs('berita/foto', $namaFoto);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->deskripsi_singkat = $request->deskripsi_singkat;
        $berita->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $berita->kategori_berita_id = $request->kategori;
        $berita->sumber = $request->sumber;
        $berita->foto = $namaFoto;
        $berita->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        $idKategori = $berita->kategori_berita_id;
        $listKategori = KategoriBerita::orderBy('nama', 'asc')->get();

        $kategoriHapus = KategoriBerita::where('id', $idKategori)->withTrashed()->first();
        if ($kategoriHapus->trashed()) {
            $listKategori->push($kategoriHapus);
        }

        return view('dashboard.pages.berita.berita.edit', compact(['listKategori', 'berita']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'isi' => 'required',
                'deskripsi_singkat' => 'required',
                'tanggal' => 'required',
                'kategori' => 'required',
                'sumber' => 'required',
                'foto' => $request->foto ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024' : 'nullable',
            ],
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'isi.required' => 'Isi tidak boleh kosong',
                'deskripsi_singkat.required' => 'Deskripsi singkat tidak boleh kosong',
                'tanggal.required' => 'Tanggal tidak boleh kosong',
                'kategori.required' => 'Kategori tidak boleh kosong',
                'sumber.required' => 'Sumber tidak boleh kosong',
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
            if (Storage::exists('berita/foto/' . $berita->foto)) {
                Storage::delete('berita/foto/' . $berita->foto);
            }

            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('berita/foto', $namaFoto);
            $berita->foto = $namaFoto;
        }

        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->deskripsi_singkat = $request->deskripsi_singkat;
        $berita->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $berita->kategori_berita_id = $request->kategori;
        $berita->sumber = $request->sumber;
        $berita->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();

        if (Storage::exists('berita/foto/' . $berita->foto)) {
            Storage::delete('berita/foto/' . $berita->foto);
        }

        return response()->json(['status' => 'success']);
    }
}
