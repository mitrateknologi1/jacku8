<?php

namespace App\Http\Controllers\dashboard\divisiPenelitian;

use App\Http\Controllers\Controller;
use App\Models\Pengabdian;
use App\Models\SkemaPengabdian;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengabdian::orderBy('id', 'desc')
                ->where(function ($query) use ($request) {
                    if ($request->jenisDokumen && $request->jenisDokumen != "Semua") {
                        $query->where('jenis_dokumen', $request->jenisDokumen);
                    }

                    if ($request->search) {
                        $query->where(function ($query) use ($request) {
                            $query->where('nama', 'like', '%' . $request->search . '%');
                            $query->orWhere('ketua', 'like', '%' . $request->search . '%');
                            $query->orWhere('anggota', 'like', '%' . $request->search . '%');
                            $query->orWhere('besar_dana', 'like', '%' . $request->search . '%');
                            $query->orWhere('tahun', 'like', '%' . $request->search . '%');
                        });
                    }
                })
                ->where(function ($query) use ($request) {
                    if ($request->sumberDana && $request->sumberDana != "Semua") {
                        $query->whereHas('sumberDana', function ($query) use ($request) {
                            $query->where('id', $request->sumberDana);
                        });
                    };
                })
                ->where(function ($query) use ($request) {
                    $query->whereHas('skemaPengabdian', function ($query) use ($request) {
                        if ($request->skema && $request->skema != "Semua") {
                            $query->where('id', $request->skema);
                        };
                    });
                })

                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('besar_dana', function ($row) {
                    return 'Rp. ' . number_format($row->besar_dana, 0, ',', '.');
                })
                ->addColumn('skema', function ($row) {
                    return $row->skemaPengabdian->nama;
                })
                ->addColumn('sumber_dana', function ($row) {
                    return $row->sumberDana->nama;
                })
                ->addColumn('jenis_dokumen', function ($row) {
                    if ($row->jenis_dokumen == "Privat") {
                        return '<span class="badge badge-warning"><i class="far fa-eye-slash"></i> Privat</span>';
                    } else {
                        return '<span class="badge badge-success"><i class="far fa-eye"></i> Publik</span>';
                    }
                })
                ->addColumn('file', function ($row) {
                    $actionBtn = '<a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/proposal/' . $row->file_proposal) .  '"><i class="fas fa-file"></i> Proposal</a><a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/laporan/' . $row->file_laporan) .  '"><i class="fas fa-file"></i> Laporan</a>
                    <a class="btn btn-primary btn-sm mx-1 my-1" href="' . Storage::url('/divisiPenelitian/pengabdian/luaran/' . $row->file_luaran) .  '"><i class="fas fa-file"></i> Luaran</a>';
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
                ->rawColumns(['action', 'jenis_dokumen', 'file'])
                ->make(true);
        }

        $daftarSkema = SkemaPengabdian::orderBy('nama', 'asc')->get();
        $daftarSumberDana = SumberDana::orderBy('nama', 'asc')->get();
        return view('dashboard.pages.divisiPenelitian.pengabdian.index', compact(['daftarSkema', 'daftarSumberDana']));
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
                'ketua' => 'required',
                'anggota' => 'required',
                'tahun' => 'required',
                'besar_dana' => 'required',
                'skema' => 'required',
                'sumber_dana' => 'required',
                'jenis_dokumen' => 'required',
                'file_proposal' => 'required',
                'file_laporan' => 'required',
                'file_luaran' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'ketua.required' => 'Ketua tidak boleh kosong',
                'anggota.required' => 'Anggota tidak boleh kosong',
                'tahun.required' => 'Tahun tidak boleh kosong',
                'besar_dana.required' => 'Besar dana tidak boleh kosong',
                'skema.required' => 'Skema penelitian tidak boleh kosong',
                'jenis_dokumen.required' => 'Jenis dokumen tidak boleh kosong',
                'file_proposal.required' => 'File proposal tidak boleh kosong',
                'file_laporan.required' => 'File laporan tidak boleh kosong',
                'file_luaran.required' => 'File luaran tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }


        $file_proposal = time() . '.' . $request->file_proposal->extension();
        $request->file_proposal->storeAs('divisiPenelitian/pengabdian/proposal', $file_proposal);

        $file_laporan = time() . '.' . $request->file_laporan->extension();
        $request->file_laporan->storeAs('divisiPenelitian/pengabdian/laporan', $file_laporan);

        $file_luaran = time() . '.' . $request->file_luaran->extension();
        $request->file_luaran->storeAs('divisiPenelitian/pengabdian/luaran', $file_luaran);

        $pengabdian = new Pengabdian();
        $pengabdian->nama = $request->nama;
        $pengabdian->ketua = $request->ketua;
        $pengabdian->anggota = $request->anggota;
        $pengabdian->tahun = $request->tahun;
        $pengabdian->besar_dana = str_replace(".", "", $request->besar_dana);
        $pengabdian->skema_pengabdian_id = $request->skema;
        $pengabdian->sumber_dana_id = $request->sumber_dana;
        $pengabdian->jenis_dokumen = $request->jenis_dokumen;
        $pengabdian->file_proposal = $file_proposal;
        $pengabdian->file_laporan = $file_laporan;
        $pengabdian->file_luaran = $file_luaran;
        $pengabdian->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengabdian $pengabdian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengabdian $pengabdian)
    {
        return response()->json($pengabdian);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengabdian $pengabdian)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'ketua' => 'required',
                'anggota' => 'required',
                'tahun' => 'required',
                'besar_dana' => 'required',
                'skema' => 'required',
                'sumber_dana' => 'required',
                'jenis_dokumen' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'ketua.required' => 'Ketua tidak boleh kosong',
                'anggota.required' => 'Anggota tidak boleh kosong',
                'tahun.required' => 'Tahun tidak boleh kosong',
                'besar_dana.required' => 'Besar dana tidak boleh kosong',
                'skema.required' => 'Skema penelitian tidak boleh kosong',
                'jenis_dokumen.required' => 'Jenis dokumen tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }

        if ($request->file_proposal) {
            if (Storage::exists('divisiPenelitian/pengabdian/proposal/' . $pengabdian->file_proposal)) {
                Storage::delete('divisiPenelitian/pengabdian/proposal/' . $pengabdian->file_proposal);
            }

            $file_proposal = time() . '.' . $request->file_proposal->extension();
            $request->file_proposal->storeAs('divisiPenelitian/pengabdian/proposal', $file_proposal);
            $pengabdian->file_proposal = $file_proposal;
        }

        if ($request->file_laporan) {
            if (Storage::exists('divisiPenelitian/pengabdian/laporan/' . $pengabdian->file_laporan)) {
                Storage::delete('divisiPenelitian/pengabdian/laporan/' . $pengabdian->file_laporan);
            }

            $file_laporan = time() . '.' . $request->file_laporan->extension();
            $request->file_laporan->storeAs('divisiPenelitian/pengabdian/laporan', $file_laporan);
            $pengabdian->file_laporan = $file_laporan;
        }

        if ($request->file_luaran) {
            if (Storage::exists('divisiPenelitian/pengabdian/luaran/' . $pengabdian->file_luaran)) {
                Storage::delete('divisiPenelitian/pengabdian/luaran/' . $pengabdian->file_luaran);
            }

            $file_luaran = time() . '.' . $request->file_luaran->extension();
            $request->file_luaran->storeAs('divisiPenelitian/pengabdian/luaran', $file_luaran);
            $pengabdian->file_luaran = $file_luaran;
        }

        $pengabdian->nama = $request->nama;
        $pengabdian->ketua = $request->ketua;
        $pengabdian->anggota = $request->anggota;
        $pengabdian->tahun = $request->tahun;
        $pengabdian->besar_dana = str_replace(".", "", $request->besar_dana);
        $pengabdian->skema_pengabdian_id = $request->skema;
        $pengabdian->sumber_dana_id = $request->sumber_dana;
        $pengabdian->jenis_dokumen = $request->jenis_dokumen;
        $pengabdian->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengabdian $pengabdian)
    {
        $pengabdian->delete();

        if (Storage::exists('divisiPenelitian/pengabdian/proposal/' . $pengabdian->file_proposal)) {
            Storage::delete('divisiPenelitian/pengabdian/proposal/' . $pengabdian->file_proposal);
        }

        if (Storage::exists('divisiPenelitian/pengabdian/laporan/' . $pengabdian->file_laporan)) {
            Storage::delete('divisiPenelitian/pengabdian/laporan/' . $pengabdian->file_laporan);
        }

        if (Storage::exists('divisiPenelitian/pengabdian/luaran/' . $pengabdian->file_luaran)) {
            Storage::delete('divisiPenelitian/pengabdian/luaran/' . $pengabdian->file_luaran);
        }

        return response()->json(['status' => 'success']);
    }
}
