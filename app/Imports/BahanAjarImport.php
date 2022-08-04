<?php

namespace App\Imports;

use App\Models\BahanAjar;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class BahanAjarImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new BahanAjar([
            'id' => $row[0],
            'nama' => $row[1],
            'prodi_id' => $row[2],
            'tahun' => $row[3],
            'tanggal_upload' => $row[4],
            'jenis_dokumen' => $row[5],
            'file' => $row[6],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
