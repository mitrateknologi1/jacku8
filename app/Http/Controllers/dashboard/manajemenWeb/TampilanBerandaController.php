<?php

namespace App\Http\Controllers\dashboard\manajemenWeb;

use App\Http\Controllers\Controller;
use App\Models\TampilanBeranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TampilanBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TampilanBeranda::orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($row) {
                    return '<img class="img-fluid my-4" width="300px" src="' . Storage::url('tampilan_beranda/' . $row->foto) . '">';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button id="btn-edit" class="btn btn-warning btn-sm mr-1" value="' . $row->id . '" ><i class="fas fa-edit"></i> Ubah</button';
                    return $actionBtn;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }
        return view('dashboard.pages.manajemenWeb.tampilanBeranda.index');
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
     * @param  \App\Models\TampilanBeranda  $tampilanBeranda
     * @return \Illuminate\Http\Response
     */
    public function show(TampilanBeranda $tampilanBeranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TampilanBeranda  $tampilanBeranda
     * @return \Illuminate\Http\Response
     */
    public function edit(TampilanBeranda $tampilanBeranda)
    {
        return response()->json($tampilanBeranda);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TampilanBeranda  $tampilanBeranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TampilanBeranda $tampilanBeranda)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ],
            [
                'foto.required' => 'Foto tidak boleh kosong',
                'foto.image' => 'Foto harus berupa gambar',
                'foto.mimes' => 'Foto harus berupa gambar',
                'foto.max' => 'Foto tidak boleh lebih dari 1 MB',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        if (Storage::exists('tampilan_beranda/' . $tampilanBeranda->foto)) {
            Storage::delete('tampilan_beranda/' . $tampilanBeranda->foto);
        }

        $namaFoto = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('tampilan_beranda', $namaFoto);
        $tampilanBeranda->foto = $namaFoto;

        $tampilanBeranda->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TampilanBeranda  $tampilanBeranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(TampilanBeranda $tampilanBeranda)
    {
        //
    }
}
