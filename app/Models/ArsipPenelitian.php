<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipPenelitian extends Model
{
    use HasFactory;

    protected $table = 'arsip_penelitian';

    public function getTanggalUploadAttribute($value)
    {
        return $this->attributes['tanggal_upload'] = Carbon::parse($value)->format('d-m-Y');
    }
}
