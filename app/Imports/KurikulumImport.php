<?php

namespace App\Imports;

use App\Models\Kurikulum;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class KurikulumImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kurikulum([
            'id' => $row[0],
            'prodi_id' => $row[1],
            'nama' => $row[2],
            'tahun' => $row[3],
            'jenis_dokumen' => $row[4],
            'file' => $row[5],
            'tanggal_upload' => $row[6],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
