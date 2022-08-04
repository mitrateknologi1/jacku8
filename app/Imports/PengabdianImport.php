<?php

namespace App\Imports;

use App\Models\Pengabdian;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class PengabdianImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pengabdian([
            'id' => $row[0],
            'nama' => $row[1],
            'ketua' => $row[2],
            'anggota' => $row[3],
            'tahun' => $row[4],
            'besar_dana' => $row[5],
            'skema_pengabdian_id' => $row[6],
            'sumber_dana_id' => $row[7],
            'jenis_dokumen' => $row[8],
            'file_proposal' => $row[9],
            'file_laporan' => $row[10],
            'file_luaran' => $row[11],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
