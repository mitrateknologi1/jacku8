<?php

namespace App\Http\Controllers\dashboard\masterData;

use App\Http\Controllers\Controller;
use App\Models\SkemaPenelitian;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SkemaPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SkemaPenelitian::orderBy('created_at', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i> Ubah</button><button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.pages.masterData.skemaPenelitian.index');
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
                'nama' => ['required', Rule::unique('skema_penelitian')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama skema penelitian tidak boleh kosong',
                'nama.unique' => 'Nama skema penelitian sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $skemaPenelitian = new SkemaPenelitian();
        $skemaPenelitian->nama = $request->nama;
        $skemaPenelitian->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkemaPenelitian  $skemaPenelitian
     * @return \Illuminate\Http\Response
     */
    public function show(SkemaPenelitian $skemaPenelitian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkemaPenelitian  $skemaPenelitian
     * @return \Illuminate\Http\Response
     */
    public function edit(SkemaPenelitian $skemaPenelitian)
    {
        return response()->json($skemaPenelitian);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkemaPenelitian  $skemaPenelitian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkemaPenelitian $skemaPenelitian)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('skema_penelitian')->ignore($skemaPenelitian->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama skema penelitian tidak boleh kosong',
                'nama.unique' => 'Nama skema penelitian sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $skemaPenelitian->nama = $request->nama;
        $skemaPenelitian->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkemaPenelitian  $skemaPenelitian
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkemaPenelitian $skemaPenelitian)
    {
        $skemaPenelitian->delete();
        return response()->json(['status' => 'success']);
    }
}
