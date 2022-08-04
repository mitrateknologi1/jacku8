<?php

namespace App\Http\Controllers\dashboard\divisiKurikulum;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Modul::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', '=', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->prodi && $request->prodi != "Semua") {
                        $query->whereHas('prodi', function ($query) use ($request) {
                            $query->where('id', '=', $request->prodi);
                        });
                    }
                })

                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('prodi', function ($row) {
                    return $row->prodi->nama;
                })
                ->addColumn('tanggal_upload', function ($row) {
                    return Carbon::parse($row->tanggal_upload)->translatedFormat('d F Y');
                })
                ->addColumn('jenis_dokumen', function ($row) {
                    if ($row->jenis_dokumen == "Privat") {
                        return '<span class="badge badge-warning"><i class="far fa-eye-slash"></i> Privat</span>';
                    } else {
                        return '<span class="badge badge-success"><i class="far fa-eye"></i> Publik</span>';
                    }
                })
                ->addColumn('bahan_pendukung', function ($row) {
                    $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/modul/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    return $actionBtn;
                })
                ->addColumn('action', function ($row) {
                    if (Auth::user()->role == "dosen") {
                        $actionBtn = '-';
                    } else {
                        $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-sm mr-1 my-1" value="' . $row->id . '" ><i class="fas fa-edit"></i> Ubah</button><button id="btn-delete" class="btn btn-danger btn-sm mr-1 my-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action', 'jenis_dokumen', 'bahan_pendukung'])
                ->make(true);
        }

        $listProdi = Prodi::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.divisiKurikulum.modul.index', compact(['listProdi']));
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
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'prodi' => 'required',
                'tanggal_upload' => 'required',
                'jenis_dokumen' => 'required',
                'file_upload' => 'required',
                'tahun' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'prodi.required' => 'Program Studi tidak boleh kosong',
                'tanggal_upload.required' => 'Tanggal upload tidak boleh kosong',
                'jenis_dokumen.required' => 'Jenis dokumen tidak boleh kosong',
                'tahun.required' => 'Tahun tidak boleh kosong',
                'file_upload.required' => 'File tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }


        $file_upload = time() . '.' . $request->file_upload->extension();
        $request->file_upload->storeAs('divisiKurikulum/modul', $file_upload);

        $modul = new Modul();
        $modul->nama = $request->nama;
        $modul->prodi_id = $request->prodi;
        $modul->file = $file_upload;
        $modul->tahun = $request->tahun;
        $modul->jenis_dokumen = $request->jenis_dokumen;
        $modul->tanggal_upload = Carbon::parse($request->tanggal_upload)->format('Y-m-d');
        $modul->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function edit(Modul $modul)
    {
        return response()->json($modul);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modul $modul)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'prodi' => 'required',
                'tanggal_upload' => 'required',
                'jenis_dokumen' => 'required',
                'tahun' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'prodi.required' => 'Program Studi tidak boleh kosong',
                'tanggal_upload.required' => 'Tanggal upload tidak boleh kosong',
                'jenis_dokumen.required' => 'Jenis dokumen tidak boleh kosong',
                'tahun.required' => 'Tahun tidak boleh kosong'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'response' => $request->all()
            ]);
        }

        if ($request->file_upload) {
            if (Storage::exists('divisiKurikulum/modul/' . $modul->file)) {
                Storage::delete('divisiKurikulum/modul/' . $modul->file);
            }

            $file_upload = time() . '.' . $request->file_upload->extension();
            $request->file_upload->storeAs('divisiKurikulum/modul', $file_upload);
            $modul->file = $file_upload;
        }

        $modul->nama = $request->nama;
        $modul->prodi_id = $request->prodi;
        $modul->tahun = $request->tahun;
        $modul->jenis_dokumen = $request->jenis_dokumen;
        $modul->tanggal_upload = Carbon::parse($request->tanggal_upload)->format('Y-m-d');
        $modul->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modul $modul)
    {
        $modul->delete();

        if (Storage::exists('divisiKurikulum/modul/' . $modul->file)) {
            Storage::delete('divisiKurikulum/modul/' . $modul->file);
        }

        return response()->json(['status' => 'success']);
    }
}
