<?php

namespace App\Http\Controllers\dashboard\masterData;

use App\Http\Controllers\Controller;
use App\Models\JabatanFungsional;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JabatanFungsionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JabatanFungsional::orderBy('created_at', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i> Ubah</button><button id="btn-delete" class="btn btn-danger btn-sm mr-1" value="' . $row->id . '" > <i class="fas fa-trash-alt"></i> Hapus</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.pages.masterData.jabatanFungsional.index');
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
                'nama' => ['required', Rule::unique('jabatan_fungsional')->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama jabatan fungsional tidak boleh kosong',
                'nama.unique' => 'Nama jabatan fungsional sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $jabatan_fungsional = new JabatanFungsional();
        $jabatan_fungsional->nama = $request->nama;
        $jabatan_fungsional->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JabatanFungsional  $jabatanFungsional
     * @return \Illuminate\Http\Response
     */
    public function show(JabatanFungsional $jabatanFungsional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JabatanFungsional  $jabatanFungsional
     * @return \Illuminate\Http\Response
     */
    public function edit(JabatanFungsional $jabatanFungsional)
    {
        return response()->json($jabatanFungsional);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JabatanFungsional  $jabatanFungsional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JabatanFungsional $jabatanFungsional)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => ['required', Rule::unique('jabatan_fungsional')->ignore($jabatanFungsional->id)->withoutTrashed()],
            ],
            [
                'nama.required' => 'Nama jabatan fungsional tidak boleh kosong',
                'nama.unique' => 'Nama jabatan fungsional sudah ada',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $jabatanFungsional->nama = $request->nama;
        $jabatanFungsional->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JabatanFungsional  $jabatanFungsional
     * @return \Illuminate\Http\Response
     */
    public function destroy(JabatanFungsional $jabatanFungsional)
    {
        $jabatanFungsional->delete();
        return response()->json(['status' => 'success']);
    }
}
