<?php

namespace App\Http\Controllers\dashboard\masterData;

use App\Http\Controllers\Controller;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SumberDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SumberDana::orderBy('created_at', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i> Ubah</button><button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.pages.masterData.sumberDana.index');
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
                'nama' => ['required', Rule::unique('sumber_dana')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama skema pengabdian tidak boleh kosong',
                'nama.unique' => 'Nama skema pengabdian sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $sumberDana = new SumberDana();
        $sumberDana->nama = $request->nama;
        $sumberDana->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function show(SumberDana $sumberDana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function edit(SumberDana $sumberDana)
    {
        return response()->json($sumberDana);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SumberDana $sumberDana)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('sumber_dana')->ignore($sumberDana->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama sumber dana tidak boleh kosong',
                'nama.unique' => 'Nama sumber dana sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $sumberDana->nama = $request->nama;
        $sumberDana->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SumberDana  $sumberDana
     * @return \Illuminate\Http\Response
     */
    public function destroy(SumberDana $sumberDana)
    {
        $sumberDana->delete();
        return response()->json(['status' => 'success']);
    }
}
