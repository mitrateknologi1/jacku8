<?php

namespace App\Http\Controllers\dashboard\divisiKurikulum;

use App\Http\Controllers\Controller;
use App\Models\ArsipKurikulum;
use App\Models\Prodi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ArsipKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ArsipKurikulum::orderBy('id', 'desc')
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
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
                    $actionBtn = '<a class="btn btn-primary btn-sm mr-1" href="' . Storage::url('/divisiKurikulum/arsip/' . $row->file) .  '"><i class="fas fa-file"></i> Download</a>';
                    return $actionBtn;
                })
                ->addColumn('action', function ($row) {
                    if (Auth::user()->role == 'dosen') {
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
        return view('dashboard.pages.divisiKurikulum.arsip.index', compact(['listProdi']));
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
                'tanggal_upload' => 'required',
                'jenis_dokumen' => 'required',
                'file_upload' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'tanggal_upload.required' => 'Tanggal upload tidak boleh kosong',
                'jenis_dokumen.required' => 'Jenis dokumen tidak boleh kosong',
                'file_upload.required' => 'File tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }


        $file_upload = time() . '.' . $request->file_upload->extension();
        $request->file_upload->storeAs('divisiKurikulum/arsip', $file_upload);

        $arsip = new ArsipKurikulum();
        $arsip->nama = $request->nama;
        $arsip->file = $file_upload;
        $arsip->jenis_dokumen = $request->jenis_dokumen;
        $arsip->tanggal_upload = Carbon::parse($request->tanggal_upload)->format('Y-m-d');
        $arsip->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArsipKurikulum  $arsipKurikulum
     * @return \Illuminate\Http\Response
     */
    public function show(ArsipKurikulum $arsipKurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArsipKurikulum  $arsipKurikulum
     * @return \Illuminate\Http\Response
     */
    public function edit(ArsipKurikulum $arsipKurikulum)
    {
        return response()->json($arsipKurikulum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArsipKurikulum  $arsipKurikulum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArsipKurikulum $arsipKurikulum)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'tanggal_upload' => 'required',
                'jenis_dokumen' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'tanggal_upload.required' => 'Tanggal upload tidak boleh kosong',
                'jenis_dokumen.required' => 'Jenis dokumen tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'response' => $request->all()
            ]);
        }

        if ($request->file_upload) {
            if (Storage::exists('divisiKurikulum/arsip/' . $arsipKurikulum->file)) {
                Storage::delete('divisiKurikulum/arsip/' . $arsipKurikulum->file);
            }

            $file_upload = time() . '.' . $request->file_upload->extension();
            $request->file_upload->storeAs('divisiKurikulum/arsip', $file_upload);
            $arsipKurikulum->file = $file_upload;
        }

        $arsipKurikulum->nama = $request->nama;
        $arsipKurikulum->jenis_dokumen = $request->jenis_dokumen;
        $arsipKurikulum->tanggal_upload = Carbon::parse($request->tanggal_upload)->format('Y-m-d');
        $arsipKurikulum->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArsipKurikulum  $arsipKurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArsipKurikulum $arsipKurikulum)
    {
        $arsipKurikulum->delete();

        if (Storage::exists('divisiKurikulum/arsip/' . $arsipKurikulum->file)) {
            Storage::delete('divisiKurikulum/arsip/' . $arsipKurikulum->file);
        }

        return response()->json(['status' => 'success']);
    }
}
